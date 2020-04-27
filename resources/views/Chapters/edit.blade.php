@extends('partials.head');
@section('content')
@include('partials.nav')
    <div class="container">
        <div style="text-align:center">
            @include('partials.mesage')
        </div>
        <div style="text-align:center">
            <span style="color:blue;font-weight:bold">Chỉnh Sửa</span>
        </div>
    <form action="{{ route('chapters.update',$chapter->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{$chapter->title}}" placeholder="Input Title">
        </div>

        <div class="form-group">
            <label for="chapter">Số Chapter</label>
            <input type="text" class="form-control" value="{{$chapter->chapter}}" name="chapter" placeholder="Input Số Chapter">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" placeholder="Input Content" cols="30" rows="10" id="content-ckeditor">{!! $chapter->content !!}</textarea>
        </div>

        <div>
            <label for="name-manga">Tên Manga</label>
                <select class="form-control" name="manga_id">
                    @foreach($mangas as $manga)
                        @if($manga->id == $chapter->manga_id )
                            <option value="{{ $chapter->manga_id }}" selected>{{ $chapter->manga->name }}</option>
                        @else
                            <option value="{{ $manga->id }}">{{ $manga->name }}</option>
                        @endif
                    @endforeach
                </select>
        </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
    </form>
        <script>
            CKEDITOR.replace('content-ckeditor');
        </script>
    </div>
@endsection
