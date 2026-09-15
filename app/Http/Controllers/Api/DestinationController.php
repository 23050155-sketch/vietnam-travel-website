<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::with([
            'province',
            'categories'
        ]);

        // Tìm kiếm theo tên địa điểm, địa chỉ hoặc tên tỉnh/thành
        if ($request->filled('q')) {
            $keyword = $request->q;

            $query->where(function ($q) use ($keyword) {
                $q->where(
                    'destination_name',
                    'like',
                    "%{$keyword}%"
                )
                ->orWhere(
                    'address',
                    'like',
                    "%{$keyword}%"
                )
                ->orWhereHas('province', function ($provinceQuery) use ($keyword) {
                    $provinceQuery->where(
                        'province_name',
                        'like',
                        "%{$keyword}%"
                    );
                });
            });
        }

        // Lọc theo tỉnh/thành
        if ($request->filled('province_id')) {
            $query->where(
                'province_id',
                $request->province_id
            );
        }

        // Lọc theo loại hình du lịch
        if ($request->filled('category_id')) {
            $query->whereHas(
                'categories',
                function ($categoryQuery) use ($request) {
                    $categoryQuery->where(
                        'categories.category_id',
                        $request->category_id
                    );
                }
            );
        }

        // Lọc theo giá vé tối thiểu
        if ($request->filled('min_price')) {
            $query->where(
                'ticket_price',
                '>=',
                $request->min_price
            );
        }

        // Lọc theo giá vé tối đa
        if ($request->filled('max_price')) {
            $query->where(
                'ticket_price',
                '<=',
                $request->max_price
            );
        }

        $destinations = $query->get();

        return response()->json([
            'success' => true,
            'data' => $destinations
        ]);
    }
}