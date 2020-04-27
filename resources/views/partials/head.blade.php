<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Truyện Tranh Online</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}


    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="{{asset('/js/app.js')}}" defer></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="vi"/>
    <meta name="_token" id="token" value="Dwq9ZQ86x2HQEyheumjnC8tgUDpF6o5fpTkYurYt">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta name="robots" content="index,follow" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-title" content="TruyenTranh24" />

	<meta name="description" content="Trang truyện tranh 24 cập nhật hàng ngày. Cùng đọc manga, manhua, manhwa với nhiều thể loại hấp dẫn." >
	<meta name="keywords" content="truyện tranh, manga, comic, đọc truyện" >
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<meta property="og:locale" content="vi_VN" />
	<meta property="og:image" itemprop="thumbnailUrl" content="" />
	<meta property="og:description" itemprop="description" content="Trang truyện tranh 24 cập nhật hàng ngày. Cùng đọc manga, manhua, manhwa với nhiều thể loại hấp dẫn.">
	<meta property="fb:app_id" content="1868270560067044" />


	<meta property="og:url" itemprop="url" content="https://truyentranh24.com">
	<meta property="og:site_name" content="TruyenTranh24">
	<meta property="og:type" itemprop="type" content="website">
	<meta property="og:title" itemprop="headline" content="Truyện Tranh 24">

    <link rel="stylesheet" href="{{asset('CSS/style.css')}}">
	{{-- <link href="{{asset('/css/app.css')}}" rel="stylesheet"> --}}
	{{-- <link href="{{asset('CSS/style2.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{asset('CSS/style3.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script type="text/javascript" src="/js/bhome.js?id=90c66a31632cda4e2571"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-159640797-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

      gtag('config', 'UA-159640797-1');
    </script>
</body>
</html>
