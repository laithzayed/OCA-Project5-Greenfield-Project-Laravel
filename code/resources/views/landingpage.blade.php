<!DOCTYPE html>
<html>

<!-- Mirrored from askbootstrap.com/preview/miver/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Oct 2020 08:14:33 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Gurdeep singh osahan">
<meta name="author" content="Gurdeep singh osahan">
<title>jobs website</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<link rel="icon" type="image/png" href="images/fav.svg">

<link href="{{asset('public_theme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<link href="{{asset('public_theme/vendor/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">

<link href="{{asset('public_theme/vendor/icons/css/materialdesignicons.min.css')}}" media="all" rel="stylesheet" type="text/css">

<link href="{{asset('public_theme/vendor/slick-master/slick/slick.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('public_theme/vendor/lightgallery-master/dist/css/lightgallery.min.css')}}" rel="stylesheet">

<link href="{{asset('public_theme/vendor/select2/css/select2-bootstrap.css')}}" />
<link href="{{asset('public_theme/vendor/select2/css/select2.min.css')}}" rel="stylesheet">

<link href="{{asset('public_theme/css/style.css')}}" rel="stylesheet">
</head>
<body>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<section class="py-5 homepage-search-block position-relative">
    <div class="container">
    <div class="row py-lg-5">
    <div class="col-lg-7">
    <div class="homepage-search-title">
    <h1 class="mb-3 text-shadow text-gray-900 font-weight-bold">Welcome TO itPath</h1>
    <h5 class="mb-5 text-shadow text-gray-800 font-weight-normal">Millions of people use miver to turn their ideas into reality.
    </h5>
    </div>
    <div class="homepage-search-form">
    <form class="form-noborder" method="POST" action="search_post">
        @csrf
    <div class="form-row">

    <div class="col-lg-2 col-md-2 col-sm-12 form-group">
 <a href="" ><button type="submit" class="btn btn-success btn-lg"><i class="fas fa-home"></i>Go Home</button> </a>
    </div>
    </div>
    </form>
    </div>
    
    </div>
    <div class="col-lg-5">
    <img class="img-fluid" src="{{asset('public_theme/images/banner.svg')}}" alt='' />
    </div>
    </div>
    </div>
    </section>