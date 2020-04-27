
@extends('partials.head');
@section('content')
@include('partials.nav')
<div>
    @if(Gate::allows('create-post'))
        <a class="btn btn-primary" href="{{ route('chapters.create') }}">Thêm chapter mới</a>
            <a href="{{route('chapters.history')}}"  class ="btn btn-danger" title="Danh sách xóa mềm" class="btn btn-danger" style=" margin-left:960px" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
    @endif
</div>
<div class="container" data-id="100087" data-name="" data-slug="hoan-doi-nhiem-mau" data-total="215">
	<section>
		<div class="column-left manga-info">
            <div class="row">
                <div class="manga-thumbnail col-3">
                    <img src="{{ asset('img/banner/' . $manga->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/04/11/7a9679270ef80c1f_91c762801188c20b_194471586603740345957.jpg" data-id="100087" alt="Hoán Đổi Nhiệm Màu">
                </div>
            <div class="col-9 pl-5">
                <h1 class="manga-title">{{ $manga->name }}</h1>
                    <h3>
                        @if(empty($chapter->title))
                            Không có chapter nào
                        @else
                            {{  $chapter->title }}
                        @endif
                    </h3>
                        <div class="manga-author">
		                    <label>Tác giả:</label>
		                        <span>{{ $manga->author }}</span>
                        </div>
	                <div class="manga-status">
		                <label>Tình trạng:</label>
                            <span>{{ $manga->status }}</span>
			        </div>
		        <div class="manga-latest">
		            <label>Mới nhất:</label>
                        <span><a class="color-1" href="/hoan-doi-nhiem-mau/chap-214">{{ count($manga->chapters) }}</a></span>
	            </div>
		    <div class="manga-views">
                <label>Lượt đọc</label>
                    <span>{{ $sum }}</span>
	        </div>
	    <button class="btn btn-success">Thích <span>0</span></button>
            <button class="btn btn-primary">Theo dõi <span>0</span></button>
	            <a class="btn btn-light" href="{{route('chapters.show',$chapter->id)}}">Đọc từ đầu</a>
        </div>
    </div>
	    <div class="section-title color-1">Nội dung</div>
	        <div class="manga-content">{!! $manga->content !!}</div>
                <div class="section-title color-1">Danh sách chap</div>
		            <div class="manga-chapter pd-10">
                        <div class="row">
                            <table class="table" style="margin-left:10px">
                                <tr>
                                    <td>Tên chap</td>
                                    <td>Cập nhật</td>
                                    <td>Lượt đọc</td>
                                    @if(Gate::any(['update-post', 'delete-post']))
                                    <td>Thao tác</td>
                                    @endif
                                </tr>
                                @for($i=0;$i<count($manga->chapters);$i++)
                                    <tr>
                                        <td><a href="{{ route('chapters.show',$manga->chapters[$i]->id) }}">Chapter {{ $manga->chapters[$i]->chapter }}</a></td>
                                        <td>{{ $manga->chapters[$i]->created_at->diffForHumans($now) }}</td>
                                        <td>{{$manga->chapters[$i]->view_count}}</td>
                                        @if(Gate::any(['update-post', 'delete-post']))
                                        <td>
                                            <form action="{{route('chapters.destroy',$manga->chapters[$i]->id)}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <a title="Edit"  href="{{route('chapters.edit',$manga->chapters[$i]->id)}}"  class="btn btn-success"><i id =' Edit' class='fa fa-pencil-square'></i></a>
                                                <button title="Delete"   class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i id='Delete' class='fa fa-trash-o'></i></button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                 @endfor
                            </table>
                        </div>
		            <div class="btn btn-light">
                <span>xem thêm</span>
		    </div>
	    </div>
			<div class="manga-tag">
				Từ khoá:
					<a class="btn btn-light" href="/hoan-doi-nhiem-mau">Truyện Hoán Đổi Nhiệm Màu</a>
					<a class="btn btn-light"href="/hoan-doi-nhiem-mau">Lookism</a>
					<a href="/hoan-doi-nhiem-mau/chap-214">Hoán Đổi Nhiệm Màu chap mới nhất</a>
					<a class="btn btn-light"  href="/hoan-doi-nhiem-mau/chap-214">chap 214</a>
					<a  class="btn btn-light" href="/hoan-doi-nhiem-mau/chap-214">Lookism chap 214</a>
					<a class="btn btn-light" href="/hoan-doi-nhiem-mau">Hoán Đổi Nhiệm Màu</a>
			</div>

		</div>
			<div class="column-right">
				<div class="section-title color-9">Top trong tuần</div>
					<div class="item-large">
						<a href="/kimetsu-no-yaiba">
							<div class="item-poster">
								<img style="width: 100%;height: 30%;" src="{{ asset('img/banner/' . $manga->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/03/06/c13c137597da081f_f4278fdff371f2b7_93155158347150251.jpg" data-id="100003">
								    <span class="background-9">38,135 lượt đọc</span>
							</div>
						</a>
						    <a href="/kimetsu-no-yaiba"><h3 class="item-title">Kimetsu no Yaiba</h3></a>
			        </div>
		    </div>
    </section>

<section>
    <div class="section-title color-1">Truyện mới nhất</div>
        @foreach ($mangas_new as $item_manga)
			<div class="item-medium">
				<a href="/hoan-doi-nhiem-mau">
					<div class="item-thumbnail">
						<img src="{{ asset('img/banner/' . $item_manga->image) }}" data-src="https://icdn.truyentranh24.com/tt24/2020/04/11/7a9679270ef80c1f_91c762801188c20b_194471586603740345957.jpg" data-id="100087" alt="Hoán Đổi Nhiệm Màu">
							<span class="background-4">{{$item_manga->created_at->diffForHumans($now)}}</span>
					</div>
				</a>
					<a href="/hoan-doi-nhiem-mau"><h3 class="item-title">{{$item_manga->name}}</h3></a>
            </div>
        @endforeach
</section>

		{{-- <section>
			<div class="section-title color-3">ĐỪNG BỎ LỠ</div>
							<div class="item-medium">
					<a href="/asuperu-kanojo">
						<div class="item-thumbnail">
							<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://icdn.truyentranh24.com/tt24/2020/03/26/198f923ea77da3f0_a17f02b5b1feb7dc_179601585240116745957.jpg" data-id="100055" alt="Asuperu Kanojo">
							<span class="background-3">3 tuần trước</span>
						</div>
					</a>
					<a href="/asuperu-kanojo"><h3 class="item-title">Asuperu Kanojo</h3></a>
				</div>
							<div class="item-medium">
					<a href="/trung-sinh">
						<div class="item-thumbnail">
							<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://icdn.truyentranh24.com/tt24/2020/03/25/9570e2792fd303b1_3e2d32a22f040cf6_372301585152072445957.jpg" data-id="100048" alt="Trùng Sinh">
							<span class="background-3">3 tuần trước</span>
						</div>
					</a>
					<a href="/trung-sinh"><h3 class="item-title">Trùng Sinh</h3></a>
				</div>
							<div class="item-medium">
					<a href="/nha-co-nam-nang-dau">
						<div class="item-thumbnail">
							<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://icdn.truyentranh24.com/tt24/2020/03/27/b4c2ae0167d02e6f_89181cceecbd8038_300791585324678145957.jpg" data-id="100068" alt="Nhà Có Năm Nàng Dâu">
							<span class="background-3">2 tuần trước</span>
						</div>
					</a>
					<a href="/nha-co-nam-nang-dau"><h3 class="item-title">Nhà Có Năm Nàng Dâu</h3></a>
				</div>
							<div class="item-medium">
					<a href="/co-nang-ngoc-nghech">
						<div class="item-thumbnail">
							<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://icdn.truyentranh24.com/tt24/2020/03/19/015c5ba1c1802d2e_c199587ed2f46c18_323681584614456645957.jpg" data-id="100037" alt="Cô Nàng Ngốc Nghếch">
							<span class="background-3">4 tuần trước</span>
						</div>
					</a>
					<a href="/co-nang-ngoc-nghech"><h3 class="item-title">Cô Nàng Ngốc Nghếch</h3></a>
				</div>
							<div class="item-medium">
					<a href="/toaru-ossan-no-vrmmo-katsudouki">
						<div class="item-thumbnail">
							<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://icdn.truyentranh24.com/tt24/2020/03/21/11d21564f55d049e_3aef1fb0933c0101_455021584781065845957.jpg" data-id="100041" alt="Toaru Ossan no VRMMO Katsudouki">
							<span class="background-3">3 tuần trước</span>
						</div>
					</a>
					<a href="/toaru-ossan-no-vrmmo-katsudouki"><h3 class="item-title">Toaru Ossan no VRMMO Katsudouki</h3></a>
				</div>
							<div class="item-medium">
					<a href="/tien-nghich">
						<div class="item-thumbnail">
							<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="https://icdn.truyentranh24.com/tt24/2020/03/26/dadf31f99c626543_7ba618f753ff6109_379221585240357345957.jpg" data-id="100057" alt="Tiên Nghịch">
							<span class="background-3">3 tuần trước</span>
						</div>
					</a>
					<a href="/tien-nghich"><h3 class="item-title">Tiên Nghịch</h3></a>
				</div>
					</section> --}}
	</div>
@endsection
