<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\ViewHistory;

class PlaceController extends Controller
{
    public function show(string $slug)
    {
        $place = Place::with([
                'province',
                'images',
                'categories',
                'comments' => function ($query) {
                    $query
                        ->whereNull('parent_id')
                        ->with([
                            'user',
                            'replies.user'
                        ])
                        ->latest();
                },
            ])
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $place->increment('view_count');

        if (auth()->check()) {

            ViewHistory::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'place_id' => $place->id,
                ],
                [
                    'viewed_at' => now(),
                ]
            );

        }

        /*
        |--------------------------------------------------------------------------
        | ĐỊA ĐIỂM LIÊN QUAN
        | Ưu tiên địa điểm có nhiều loại hình trùng nhất
        |--------------------------------------------------------------------------
        */

        $categoryIds = $place->categories->pluck('id');

        $relatedPlaces = Place::query()

            // Không lấy chính địa điểm đang xem
            ->where(
                'id',
                '!=',
                $place->id
            )

            // Chỉ lấy địa điểm đang hoạt động
            ->where(
                'status',
                'active'
            )

            // Phải có ít nhất 1 loại hình trùng
            ->whereHas(
                'categories',
                function ($query) use ($categoryIds) {

                    $query->whereIn(
                        'categories.id',
                        $categoryIds
                    );
                }
            )

            /*
            | Đếm số category trùng với địa điểm hiện tại.
            | Giá trị này sẽ được lưu vào:
            | matching_categories_count
            */
            ->withCount([
                'categories as matching_categories_count'
                    => function ($query) use ($categoryIds) {

                        $query->whereIn(
                            'categories.id',
                            $categoryIds
                        );
                    }
            ])

            // Load dữ liệu dùng để hiển thị card
            ->with([
                'province',
                'categories'
            ])

            // Ưu tiên nơi có nhiều loại hình trùng nhất
            ->orderByDesc(
                'matching_categories_count'
            )

            // Nếu bằng nhau thì ưu tiên lượt xem cao
            ->orderByDesc(
                'view_count'
            )

            ->limit(4)

            ->get();


        /*
        |--------------------------------------------------------------------------
        | ĐỊA ĐIỂM GẦN ĐÂY
        |--------------------------------------------------------------------------
        */

        $nearbyPlaces = collect();

        if (
            !is_null($place->latitude) &&
            !is_null($place->longitude)
        ) {
            $latitude = (float) $place->latitude;
            $longitude = (float) $place->longitude;

            $nearbyPlaces = Place::query()
                ->select('places.*')
                ->selectRaw(
                    '(
                        6371 * ACOS(
                            LEAST(1, GREATEST(-1,
                                COS(RADIANS(?))
                                * COS(RADIANS(latitude))
                                * COS(RADIANS(longitude) - RADIANS(?))
                                + SIN(RADIANS(?))
                                * SIN(RADIANS(latitude))
                            ))
                        )
                    ) AS distance_km',
                    [$latitude, $longitude, $latitude]
                )
                ->where('id', '!=', $place->id)
                ->where('status', 'active')
                ->whereNotNull('latitude')
                ->whereNotNull('longitude')
                ->whereRaw('latitude BETWEEN -90 AND 90')
                ->whereRaw('longitude BETWEEN -180 AND 180')
                ->having('distance_km', '<=', 80)
                ->with(['province', 'categories'])

                // Ưu tiên địa điểm cùng tỉnh trước.
                ->orderByRaw(
                    'CASE WHEN province_id = ? THEN 0 ELSE 1 END',
                    [$place->province_id]
                )

                // Trong từng nhóm, chọn địa điểm gần nhất.
                ->orderBy('distance_km')
                ->limit(8)
                ->get();
        }
            

        return view(
            'places.show',
            compact(
                'place',
                'relatedPlaces',
                'nearbyPlaces'
            )
        );
    }
}