@extends('partials.head');
@section('content')
@include('partials.nav')

<div class="container">
    <div style="text-align:center">
        @include('partials.mesage')
    </div>
        <b><h2  style="text-align:center" >Thùng rác</h2></b>
            <table  border="1" width="100%" height="20%" class="table-history" style="background: #e6fff7;">
                <thead >
                    <tr align="center" >
                    <th>SL</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Người xóa</th>
                    <th>Phục hồi</th>
                    <th>Xóa hẳn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mangas as $key => $manga)
                        <tr align="center">
                            <td>{{$key++}}</td>
                            <td>{{$manga->name}}</td>
                            <td>{{$manga->author}}</td>
                            <td>{!!$manga->content!!}</td>
                            <td>{{$manga->status}}</td>
                            <td>{{Auth::user()->email}}</td>
                            <td><img width="35%" height="25%" src="{{ asset('img/banner/' . $manga->image) }}" data-id="100000" alt="One Piece"></td>
                            <td><a href="{{route('mangas.restore',$manga->id)}}" data-id="100000" title="Phục hồi"><i class="fa fa-undo" aria-hidden="true"></i></td>
                            <td>
                                <form action="{{route('mangas.delete',$manga->id)}}" method="post">
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
