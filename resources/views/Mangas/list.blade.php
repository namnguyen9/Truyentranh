@extends('partials.head');
@section('content')
@include('partials.nav')
<div class="container">
	<section>
        <div style="text-align:center">
            @include('partials.mesage')
        </div>
        @if(Gate::allows('create-post'))
            <a class="btn btn-primary" href="{{ route('mangas.create') }}">Thêm mới</a>
                <a  class ="btn btn-danger" title="Danh sách xóa mềm" class="btn btn-danger" style=" margin-left:960px" href="{{route('mangas.history')}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
        @endif
            <div class="section-title bottom-30">Danh sách truyện</div>
                @if(!isset($mangas) || count($mangas) === 0)
                    <p class="text-danger">Không có sản phẩm nào.</p>
                @else
                    @foreach($mangas as $key => $manga)
						<div class="item-medium">
                            <a href="{{ route('mangas.show',$manga->id) }}">
							    <div class="item-thumbnail">
                                    <img src="{{ asset('img/banner/' . $manga->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/04/11/7a9679270ef80c1f_91c762801188c20b_194471586603740345957.jpg" data-id="100087">
                                        <span class="background-8">@if($manga->created_at->diffForHumans($now)!=0){{ $manga->created_at->diffForHumans($now) }}@endif  |
                                            @php
                                                $view = array ();
                                            @endphp
                                                @foreach ($chapters as $key => $chapter)
                                                    @if($chapter->manga_id == $manga->id)
                                                        @php
                                                            array_push($view,$chapter->view_count);
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @php
                                                echo  array_sum($view).' lượt đọc'
                                            @endphp
                                        </span>
                                </div>
                                @if(Gate::any(['update-post', 'delete-post']))
                                    <div style="text-align:center">
                                        <form action="{{ route('mangas.destroy',$manga->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <a title ="Edit" class="btn btn-success" href="{{ route('mangas.edit',$manga->id) }}"><i id =' Edit' class='fa fa-pencil-square bg-success'></i></a>
                                            <button title="Delete" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i  id='Delete' class='fa fa-trash-o'></i></button>
                                        </form>
                                    </div>
                                @endif
						    </a>
                            <a href="{{ route('mangas.show',$manga->id) }}"><h3 class="item-title">{{ $manga->name }}</h3></a>
                        </div>
                    @endforeach
                <div>
                    <ul class="pagination" role="navigation">
                        <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous"><span class="page-link" aria-hidden="true">&lsaquo;</span></li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="https://truyentranh24.com/danh-sach?p=2">2</a></li>
                                    <li class="page-item"><a class="page-link" href="https://truyentranh24.com/danh-sach?p=3">3</a></li>
                            <li class="page-item">
                        <a class="page-link" href="https://truyentranh24.com/danh-sach?p=2" rel="next" aria-label="Next &raquo;">&rsaquo;</a></li>
                    </ul>
                </div>
                @endif
                    @endsection
    </section>
</div>

