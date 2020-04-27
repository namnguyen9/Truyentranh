<?php

namespace App\Http\Controllers;

use App\Chapters;
use App\Mangas;
use Illuminate\Http\Request;
use App\Http\Requests\FormExampleRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Str;

class MangasControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mangas = Mangas::paginate(18);
        $chapters =Chapters::all();
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $now = Carbon::now();
        return view('Mangas.list', compact('mangas','now','chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Mangas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormExampleRequest $request)
    {
        $manga = new Mangas();
        $manga->name = request('name');
        $manga->author = request('author');
        $manga->content = request('content');
        $manga->status = request('status');
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/banner/" . $image))
            {
            $image = Str::random(5) . "_" . $name_image;
            }
        $file->move("img/banner", $image);
        $manga->image = $image;
        }
        $manga->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Thêm mới thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('mangas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $manga = Mangas::findOrFail($id);
        $sum = Chapters::where('manga_id',$id)->sum('view_count');
        $chapter =Chapters::where('manga_id',$id)->first();
        $mangas_new = Mangas::with('chapters')->orderBy('created_at', 'desc')->take(6)->get();
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $now = Carbon::now();
        // $chapters = Chapters::where('manga_id',$id)->get();
        return view('mangas.show', compact('manga','sum','chapter','mangas_new','now'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $manga = Mangas::findOrFail($id);
        return view('mangas.edit', compact('manga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormExampleRequest $request, $id)
    {
        //
        $manga = Mangas::findOrFail($id);
        $manga->name     = $request->input('name');
        $manga->author    = $request->input('author');
        $manga->content      = $request->input('content');
        $manga->status      = $request->input('status');
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("img/banner/" . $image))
            {
                $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("img/banner", $image);
            if (!empty($banner->image))
            {
                unlink("img/banner/" . $banner->image);
            }
            $manga->image = $image;
        }
        $manga->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật  thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('mangas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $manga = Mangas::findOrFail($id);
        $manga->delete();
        //dung session de dua ra thong bao
        if($manga->trashed())
        {
        Session::flash('success', 'Xóa  thành công');
        }
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('mangas.index');
    }
}
