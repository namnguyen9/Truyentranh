@extends('partials.head');
@include('partials.nav')
@section('content')
    <div class="container">
        <div style="text-align:center">
            @include('partials.mesage')
        </div>
   <div style="text-align:center">
        <span style="color:blue;font-weight:bold">Thêm Mới</span>
    </div>
    <form action="{{ route('mangas.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input Name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" placeholder="Input Author" value="{{ old('name') }}"">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
        <textarea name="content" class="form-control" placeholder="Input Content" cols="30" rows="10" id="content-ckeditor">{!! old('content') !!}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" placeholder="Input Status" value="{{ old('status') }}"">
        </div>

        <div class="form-group">
            <label for="title">Image</label>
            <input  id="imgPost" type="file" class="form-control" name="image" placeholder="chọn ảnh" onchange="readURL(event)">
            <img style="display:none;" id="image" src="#" alt="" srcset="" width="200" height="200" >
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
    </form>

    <script>
        CKEDITOR.replace('content-ckeditor');
        function readURL(event) {
        if (event.target.files && event.target.files[0]) {
            let reader = new FileReader();
            reader.onload = function () {
                let output = document.getElementById('image');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    $("#imgPost").change(function() {
        readURL(this);
    });
    </script>
</div>
@endsection
