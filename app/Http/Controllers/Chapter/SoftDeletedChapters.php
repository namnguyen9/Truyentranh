<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapters;
use Illuminate\Support\Facades\Session;

class SoftDeletedChapters extends Controller
{
    //
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chapters = Chapters::onlyTrashed()->get();
        return view('chapters.history',compact('chapters'));
    }

    public function restore($id)
    {
        Chapters::onlyTrashed()->where('id', $id)->restore();
        Session::flash('success', 'Khôi phục thành công');
        return redirect()->route('chapters.history');

    }

    public function delete($id)
    {
        //
        Chapters::onlyTrashed()->where('id', $id)->forceDelete();
        Session::flash('success', 'Xóa vĩnh viễn thành công');
        return redirect()->route('chapters.history');
    }

    public function content()
    {
        $chapters = Chapters::onlyTrashed()->get();
        return view('chapters.content',compact('chapters'));
    }
}
