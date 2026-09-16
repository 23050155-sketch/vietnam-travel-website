<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $provinces = Province::orderBy('name')->get();

        return view('home', compact('provinces'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'province' => 'required|string',
        ]);

        $province = Province::where('name', $request->province)->first();

        if (!$province) {
            return back()->with('error', 'Không tìm thấy tỉnh/thành này.');
        }

        return redirect('/provinces/' . $province->slug);
    }
}