<nav class="navbar">
	<div class="navbar-container" style="overflow: unset;">
    <a class="logo" href="{{ route('home.index') }}">
						<img id="logo" src="{{ asset('logo.svg') }}">
					</a>
		<div class="navbar-toggle"><i class="fas fa-bars"></i></div>
		<div class="navbar-menu">
            <form action="{{ route('mangas.search') }}" class="navbar-search" method="GET">
                @csrf
				<input  type="text" name="keyword" autocomplete="off">
				<div class="icon">
                    <button  style="margin-top:20%" type="submit" class="btn btn-default"><i  class="fa fa-search" aria-hidden="true"></i></button>
				</div>
			</form>
        <div class="navbar-item"><a href="{{ route('mangas.index') }}"><i class="fas fa-list"></i>Danh Sách</a></div>

			<div class="navbar-item"><a href="/truyen-hot"><i class="fas fa-chart-line"></i>Truyện Hot</a></div>
			<div class="navbar-item"><a href="/top-ngay"><i class="fas fa-chart-bar"></i>Top Hôm Nay</a></div>
			<div class="navbar-close">
				<i class="fas fa-times"></i>
			</div>
		</div>
        @if(Auth::check())
            <div class="navbar-user">
                <div class="navbar-avatar">
                    <a href="{{url('logout')}}"><i style="margin-top:20%"  class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
            </div>
        @else
		<div class="navbar-user">
			<div class="navbar-avatar">
                <a href="/login"><i style="margin-top:20%" class="fa fa-user-circle" aria-hidden="true"></i></a>
			</div>
        </div>
        @endif
	</div>
</nav>
