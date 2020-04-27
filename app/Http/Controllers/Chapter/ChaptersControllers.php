<?php

namespace App\Http\Controllers;

use App\Chapters;
use App\Mangas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\FormChapterRequest;


class ChaptersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mangas = Mangas::all();
        return view('chapters.create', compact('mangas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormChapterRequest $request)
    {
        //
        $sochapter = Chapters::where('chapter',request('chapter'))->where('manga_id',request('manga_id'))->get();
        if(isset($sochapter[0]->chapter) && isset($sochapter[0]->manga_id ))
        {
            Session::flash('success', 'Chapter đã tồn tại');
            return redirect()->route('chapters.create');
        }
        else
        {
        $chapter = new Chapters();
        $chapter->title = request('title');
        $chapter->chapter = request('chapter');
        $chapter->content = request('content');
        $chapter->manga_id = request('manga_id');
        $chapter->save();
         //dung session de dua ra thong bao
        Session::flash('success', 'Thêm mới thành công');
            //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('chapters.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapterKey = 'chapter_'.$id;
        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if(!Session::has($chapterKey))
        {
            Chapters::where('id',$id)->increment('view_count');
            Session::put($chapterKey,1);
        }
        $chapter = Chapters::findOrFail($id);
        $manga = Mangas::findOrFail($chapter->manga_id);
        $next_chapter = Chapters::where('id','>', $chapter->id)->where('manga_id',$chapter->manga_id)->orderBy('id','asc')->first();
        $previous_chapter = Chapters::where('id','<', $chapter->id)->where('manga_id',$chapter->manga_id)->orderBy('id','desc')->first();
        return view('chapters.show', compact('chapter', 'manga','next_chapter','previous_chapter'));
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
        $mangas = Mangas::all();
        $chapter = Chapters::findOrFail($id);
        return view('chapters.edit', compact('chapter','mangas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormChapterRequest $request, $id)
    {
        //
        $chapter = Chapters::findOrFail($id);
        $chapter->title = $request->input('title');
        $chapter->chapter = $request->input('chapter');
        $chapter->content = $request->input('content');
        $chapter->manga_id = $request->input('manga_id');
        $chapter->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Chỉnh sửa  thành công');
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
    $chapter = Chapters::findOrFail($id);
    $chapter->delete();
    //dung session de dua ra thong bao
    Session::flash('success', 'Xóa  thành công');
    //xoa xong quay ve trang danh sach khach hang
    return redirect()->route('mangas.index');
    }
}
