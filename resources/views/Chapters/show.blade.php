@extends('partials.head');
@section('content')
@include('partials.nav')
<div class="container chapter-page" data-id="100087" data-name="" data-slug="hoan-doi-nhiem-mau">
    <section>
        <div class="column-left manga-info">
            <div class="row">
                <div class="manga-thumbnail col-3">
                        <img src="{{ asset('img/banner/' . $chapter->manga->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/04/11/7a9679270ef80c1f_91c762801188c20b_194471586603740345957.jpg" data-id="100087" alt="Hoán Đổi Nhiệm Màu">
                </div>
                    <div class="col-9 pl-5">
                        <h1 class="manga-title">{{ $chapter->title }} Chap {{ $chapter->chapter }}</h1>
                        <h3>{{ $chapter->manga->name }}</h3>
                        <div class="manga-author">
                        <label>Tác giả:</label>
                        <span>{{ $chapter->manga->author }}</span>
                    </div>

                    <div class="manga-status">
                        <label>Tình trạng:</label>
                        <span>{{ $chapter->manga->status }}</span>
                    </div>

                    <div class="manga-views">
                        <label>Lượt đọc</label>
                        <span>{{ $chapter->view_count }}</span>
                    </div>
                        <button class="btn btn-success">Thích <span>0</span></button>
                        <button class="btn btn-primary">Theo dõi <span>0</span></button>
                    </div>

                    </div>
                    <div class="column-right manga-description">
                        {!! $chapter->manga->content !!}
                    </div>
    </section>
<hr>
    <section>
        <div style="text-align:center">
            @if(isset($previous_chapter))
                <a href="{{route('chapters.show',$previous_chapter->id)}}"  class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            @endif
                <select onchange="window.location.href=this.value;">
                    @for ($i=count($manga->chapters)-1;$i>=0;$i--)
                        @if($chapter->id == $manga->chapters[$i]->id )
                            <option value='/chapters/{{ $manga->chapters[$i]->id }}' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English" selected> Chapter {{$manga->chapters[$i]->chapter}}
                            </option>
                        @else
                            <option value='/chapters/{{ $manga->chapters[$i]->id }}' data-image="img/flag-1.jpg" data-imagecss="flag yt" data-title="English" > Chapter {{$manga->chapters[$i]->chapter}}</option>
                            @endif
                        @endfor
                </select>
                    @if(isset($next_chapter))
                        <a href="{{route('chapters.show',$next_chapter->id)}}"  class="btn btn-success"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    @endif
                </div>
                    <div class="chapter-content">
                        {!! $chapter->content !!}
                    </div>

                    <div style="text-align:center">
                        @if(isset($previous_chapter))
                            <a href="{{route('chapters.show',$previous_chapter->id)}}"  class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        @endif
                            <select onchange="window.location.href=this.value;">
                                @for ($i=count($manga->chapters)-1;$i>=0;$i--)
                                    @if($chapter->id == $manga->chapters[$i]->id )
                                        <option value='/chapters/{{ $manga->chapters[$i]->id }}' data-image="img/flag-1.jpg" data-imagecss="flag yt"data-title="English" selected> Chapter {{$manga->chapters[$i]->chapter}}</option>
                                    @else
                                        <option value='/chapters/{{ $manga->chapters[$i]->id }}' data-image="img/flag-1.jpg" data-imagecss="flag yt" data-title="English" > Chapter {{$manga->chapters[$i]->chapter}}</option>
                                    @endif
                                @endfor
                            </select>
                        @if(isset($next_chapter))
                            <a href="{{route('chapters.show',$next_chapter->id)}}"  class="btn btn-success"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        @endif
                    </div>
                </div>
        <div class="manga-comment"></div>
    </section>
