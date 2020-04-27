@extends('partials.head');
@section('content')
@include('partials.nav')

<div class="container">
    <div style="text-align:center">
        @include('partials.mesage')
    </div>
        <b><h2 style="text-align:center" >Thùng rác</h2></b>
            <table  border="1" width="100%" height="10%" class="w3-table w3-striped w3-bordered" style="background: #d9ffb3;">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Số chapter</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Lượt đọc</th>
                        <th>Tên Truyện</th>
                        <th>Người xóa</th>
                        <th>Phục hồi</th>
                        <th>Xóa hẳn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapters as $key => $chapter)
                        <tr align="center">
                            <td>{{$key++}}</td>
                            <td>{{$chapter->chapter}}</td>
                            <td>{{$chapter->title}}</td>
                            <td><a href="{{route('chapters.history.content')}}">Xem</a></td>
                            <td>{{$chapter->view_count}}</td>
                            <td>{{$chapter->manga->name}}</td>
                            <td>{{Auth::user()->email}}</td>
                            <td><a href="{{route('chapters.restore',$chapter->id)}}" data-id="100000" title="Phục hồi"><i class="fa fa-undo" aria-hidden="true"></i></td>
                            <td><form action="{{route('chapters.delete',$chapter->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button title="Delete"   class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i id='Delete' class='fa fa-trash-o'></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
  </div>


