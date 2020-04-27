<?php

namespace App\Http\Controllers;

use App\Mangas;
use App\Chapters;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;


class SearchMangas extends Controller
{
    //
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!$keyword)
        {
            Session::flash('success', 'Không tìm thấy từ khóa');
            return redirect()->route('home.index');
        }
        $mangas = Mangas::where('name', 'LIKE', '%' . $keyword . '%')->paginate(12);
        $chapters =Chapters::all();
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $now = Carbon::now();
        if($mangas->isEmpty())
        {
         Session::flash('success', 'Không tìm thấy nội dung bạn yêu cầu');
        }
        return view('mangas.search', compact('mangas','chapters','now'));
    }
}
