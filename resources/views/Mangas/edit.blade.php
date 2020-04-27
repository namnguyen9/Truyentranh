@extends('partials.head');
@section('content')
@include('partials.nav')
    <div class="container">
        @include('partials.mesage')
        <div style="text-align:center"><span style="color:yellow;font-weight:bold">Chỉnh Sửa</span></div>
    <form action="{{ route('mangas.update',$manga->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $manga->name }}" placeholder="Input Name">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" value="{{ $manga->author }}" placeholder="Input Author">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea  name="content" class="form-control" placeholder="Input Content" cols="30" rows="10" id="content-ckeditor">{!! $manga->content !!}</textarea>
        </div>


        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" value="{{ $manga->status }}" placeholder="Input Status">
        </div>

        <div class="form-group">
            <label for="title">Image</label>
            <input  id="imgPost" type="file" class="form-control" name="image" placeholder="chọn ảnh" onchange="readURL(event)">
            <img id="image" src="{{ asset('img/banner/' . $manga->image) }}" alt="" srcset="" width="200" height="200" >
        </div>

        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
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
