@extends('partials.head');
@section('content')
@include('partials.nav')

<section>
    <div style="margin-top:5%;margin-left:10%">
        <div  class="section-title bottom-30">Danh sách truyện</div>
            <div style="text-align:center">
                @include('partials.mesage')
            </div>
        @foreach ($mangas as $manga)
            <div class="item-medium">
                <a href="/naruto">
                    <div class="item-thumbnail">
                        <img src="{{ asset('img/banner/' .$manga->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/03/06/fc11f9b484cd4f2b_4bd4899a9a74430b_37304158347131971.jpg" data-id="100001">
                            <span class="background-8">{{ $manga->created_at->diffForHumans($now) }} |
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
                            @endphp</span>
                    </div>
                </a>
                <a href="/naruto"><h3 class="item-title">{{$manga->name}}</h3></a>
            </div>
        @endforeach
    </div>
</section>
