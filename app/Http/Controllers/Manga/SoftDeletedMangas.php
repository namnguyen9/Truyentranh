<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Mangas;

class SoftDeletedMangas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mangas = Mangas::onlyTrashed()->get();
        return view('mangas.history',compact('mangas'));
    }
    public function restore($id)
    {
       Mangas::onlyTrashed()->where('id', $id)->restore();
       Session::flash('success', 'Khôi phục thành công');
        return redirect()->route('mangas.history');
    }
    public function delete($id)
    {
        //
        Mangas::onlyTrashed()->where('id', $id)->forceDelete();
        Session::flash('success', 'Xóa vĩnh viễn thành công');
        return redirect()->route('mangas.history');
    }
}
