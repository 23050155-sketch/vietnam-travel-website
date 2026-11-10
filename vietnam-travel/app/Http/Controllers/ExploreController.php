<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Category;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Support\TravelMonthParser;


class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $query = Province::query();

        
        // Lọc tỉnh/thành theo vùng miền
        $region = $request->query('region');

        if (in_array($region, ['north', 'central', 'south'], true)) {
            $query->where('region', $region);
        }

        $categories = Category::orderBy('name')->get();

        $selectedCategoryIds = $request->input('categories', []);

        if (!is_array($selectedCategoryIds)) {
            $selectedCategoryIds = [];
        }

        /*
        |--------------------------------------------------------------------------
        | Nếu đi từ Home bằng ?category=ID
        | thì đưa category đó vào danh sách nhiều lựa chọn
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('category') &&
            !in_array(
                (int) $request->category,
                array_map('intval', $selectedCategoryIds)
            )
        ) {
            $selectedCategoryIds[] =
                (int) $request->category;
        }
        


        // Tìm kiếm tên tỉnh / thành phố
        if ($request->filled('search')) {

            $query->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );
        }


        // Lọc theo Tỉnh / Thành phố
        if ($request->filled('type')) {

            $query->where(
                'administrative_type',
                $request->type
            );
        }


        // Nếu chọn sở thích / category
        if (!empty($selectedCategoryIds)) {

            $query->whereHas(
                'places',
                function ($placeQuery)
                use ($selectedCategoryIds) {

                    $placeQuery
                        ->where('status', 'active')
                        ->whereHas(
                            'categories',
                            function ($categoryQuery)
                            use ($selectedCategoryIds) {

                                $categoryQuery->whereIn(
                                    'categories.id',
                                    $selectedCategoryIds
                                );

                            }
                        );

                }
            );
        }


        // Lấy tháng được chọn: chỉ chấp nhận 1 đến 12.
        $selectedMonth = $request->query('month');

        $selectedMonth = filter_var(
            $selectedMonth,
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 1, 'max_range' => 12]]
        );

        $selectedMonth = $selectedMonth === false
            ? null
            : $selectedMonth;

        // Khi chọn tháng, tìm các địa điểm phù hợp trước.
        $matchingPlaceIds = null;

        if ($selectedMonth !== null) {
            $placesQuery = Place::query()
                ->where('status', 'active');

            // Kết hợp bộ lọc danh mục hiện tại.
            if (!empty($selectedCategoryIds)) {
                $placesQuery->whereHas(
                    'categories',
                    function ($categoryQuery) use ($selectedCategoryIds) {
                        $categoryQuery->whereIn(
                            'categories.id',
                            $selectedCategoryIds
                        );
                    }
                );
            }

            $matchingPlaceIds = $placesQuery
                ->get(['id', 'best_months'])
                ->filter(function ($place) use ($selectedMonth) {
                    return TravelMonthParser::matches(
                        $place->best_months,
                        $selectedMonth
                    );
                })
                ->pluck('id')
                ->all();

            // Chỉ giữ các tỉnh có địa điểm phù hợp.
            $query->whereHas('places', function ($placeQuery) use ($matchingPlaceIds) {
                $placeQuery->whereIn('places.id', $matchingPlaceIds);
            });
        }

        // Đếm địa điểm phù hợp với các bộ lọc.
        $query->withCount([
            'places' => function ($placeQuery) use (
                $selectedCategoryIds,
                $matchingPlaceIds
            ) {
                $placeQuery->where('status', 'active');

                if (!empty($selectedCategoryIds)) {
                    $placeQuery->whereHas(
                        'categories',
                        function ($categoryQuery) use ($selectedCategoryIds) {
                            $categoryQuery->whereIn(
                                'categories.id',
                                $selectedCategoryIds
                            );
                        }
                    );
                }

                if ($matchingPlaceIds !== null) {
                    $placeQuery->whereIn('places.id', $matchingPlaceIds);
                }
            }
        ]);


        $provinces = $query
            ->orderBy('name')
            ->get();


        // Category đang chọn
        $selectedCategory = null;

        if ($request->filled('category')) {

            $selectedCategory = Category::find(
                $request->category
            );

        }


        return view(
            'explore.index',
            compact(
                'provinces',
                'selectedCategory',
                'categories',
                'selectedCategoryIds'
            )
        );
    }
}