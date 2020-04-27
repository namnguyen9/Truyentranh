@extends('partials.head');
@section('content')
@include('partials.nav')
    <div class="container">
        <div style="text-align:center">
            @include('partials.mesage')
        </div>

        <div style="text-align:center">
            <span style="color:blue;font-weight:bold">Thêm Chapter Mới</span>
        </div>

        <form action="{{ route('chapters.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Input Title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="chapter">Số Chapter</label>
                <input type="text" class="form-control" name="chapter" placeholder="Input Số Chapter" value="{{ old('chapter') }}" >
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" placeholder="Input Content" cols="30" rows="10" id="content-ckeditor">{!! old('content') !!}</textarea>
            </div>

            <div>
                <label for="name-manga">Tên Manga</label>
                    <select class="form-control" name="manga_id">
                        @foreach($mangas as $manga)
                            <option value="{{$manga->id}}">{{ $manga->name }}</option>
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
