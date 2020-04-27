@extends('partials.head');
@section('content')
@include('partials.nav')
<div class="container">
	<section>
        <div class="section-title color-1">Chap mới nhất</div>
            @if(!isset($mangas)|| count($mangas) === 0)
                <p class="text-danger">Không có sản phẩm nào.</p>
            @else
                @foreach($mangas as $key => $manga)
                    @if($manga->chapters->last() != null)
                        <div class="item-medium">
                            <a href="{{ route('chapters.show', $manga->chapters->last()->id) }}">
                                <div class="item-thumbnail">
                                    <img src=" {{ asset('img/banner/' . $manga->image) }}">
                                        <span class="background-1">Chap {{ count($manga->chapters) }}| @if($manga->chapters->last()->created_at->diffForHumans($now)!=0){{$manga->chapters->last()->created_at->diffForHumans($now)}}@endif</span>
                                </div>
                            </a>
                            <h3 class="item-title">
                                <a href="/he-thong-che-tao-nu-than">{{ $manga->name }}</a>
                            </h3>
                        </div>
                    @endif
                @endforeach
    </section>

<section>
    @foreach ($items as $item)
		<div class="item-big">
			<a href="{{ route('mangas.show', Crypt::encrypt($item->id)) }}">
				<div class="item-thumbnail">
					<img src="{{ asset('img/banner/' . $item->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/02/28/670a9b902637e793_eb208d7b274035f1_143956158288498961.jpg" data-id="100000" alt="One Piece">
                        <span class="background-8">{{$item->created_at->diffForHumans($now)}} |
                            @php
                                $view = array ();
                            @endphp
                                @foreach ($chapters as $key => $chapter)
                                    @if($chapter->manga_id == $item->id)
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
			</a>
	        <div class="item-meta">
				<a href="{{ route('mangas.show',$item->id) }}"><h3 class="item-title">{{ $item->name }}</h3></a>
					<p class="item-description">{!! $item->content !!}</p>
			</div>
        </div>
    @endforeach
</section>

<section>
	<div class="column-left new">
        <div class="section-title color-4">Truyện mới</div>
            @foreach ($mangas_new as $item_manga)
				<div class="item-large">
                    <a href="{{ route('mangas.show',$item_manga->id)}}">
						<div class="item-thumbnail">
							<img src="{{ asset('img/banner/' . $item_manga->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/04/11/7a9679270ef80c1f_91c762801188c20b_194471586603740345957.jpg" data-id="100087" alt="Hoán Đổi Nhiệm Màu">
								<span class="background-4">{{$item_manga->created_at->diffForHumans($now)}}</span>
						</div>
					</a>
						<a href="{{ route('mangas.show',$item_manga->id)}}"><h3 class="item-title color-4">{{ $item_manga->name }}</h3></a>
						    <span class="item-views">
                                @php
                                    $view = array ();
                                @endphp
                                    @foreach ($chapters as $key => $chapter)
                                        @if($chapter->manga_id == $item_manga->id)
                                            @php
                                                array_push($view,$chapter->view_count);
                                            @endphp
                                        @endif
                                    @endforeach
                                @php
                                    echo  array_sum($view).' lượt đọc'
                                @endphp
                            </span>
						<div class="item-children">Chap mới nhất
                            @for ($i = count($item_manga->chapters) - 1, $tmp = 1; $i >= 0; $i--, $tmp++)
                                @if($tmp > 3) @break ;
                                @endif
                                    @if($item_manga->chapters[$i]->manga_id==$item_manga->id)
                                        <a href="{{ route('chapters.show', $item_manga->chapters[$i]->id) }}">
                                            <span class="child-name">Chap {{  $item_manga->chapters[$i]->chapter ?? '' }}</span>
                                                <span class="child-update">	{{  $item_manga->chapters[$i]->created_at->diffForHumans($now) ??  ''}} </span>
                                        </a>
                                    @endif
                            @endfor
                        </div>
                </div>
            @endforeach
																																										</div>
			<div class="column-right">
                <div class="section-title color-9">Top tuần</div>
                    @foreach($tops as $top)
					    <div class="item-large">
					        <a href="/vo-toi-la-quy-vuong">
						        <div class="item-poster">
							        <img  style="width: 100%;height: 35%;"src="{{ asset('img/banner/' . $top->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/04/02/6307caa26b7dd7f3_1cfbb606a07ba17f_464481585832463345957.jpg" data-id="100083" alt="Vợ tôi là quỷ vương">
							            <span class="background-9">2,146 lượt đọc</span>
						        </div>
					        </a>
                        <a href="/vo-toi-la-quy-vuong"><h3 class="item-title">{{$top->name}}</h3></a>
                    @endforeach
				</div>
            </div>
                @endif
        @endsection
    </section>
</div>
