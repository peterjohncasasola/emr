@if(Config::get('defaults.default.is_local')==1)

<link rel="stylesheet" href="{{URL::to('assets/modules/bootstrap/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{URL::to('assets/modules/bootstrap/css/bootstrap.min.css')}}"> 

<link rel="stylesheet" href="{{URL::to('assets/modules/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{URL::to('assets/modules/fontawesome/css/all.min.css')}}">

<!-- CSS Libraries -->

<!-- Page Specific CSS Libraries -->
<link rel="stylesheet" href="{{URL::to('assets/modules/jquery-selectric/selectric.css')}}">
<link rel="stylesheet" href="{{URL::to('assets/modules/jquery-selectric/selectric.css')}}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">
<link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">

<link rel="stylesheet" href="{{URL::to('assets/css/components.css')}}">
<link rel="stylesheet" href="{{URL::to('assets/css/components.css')}}">

@else

<link rel="stylesheet" href="{{asset('public/assets/modules/bootstrap/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{asset('public/assets/modules/bootstrap/css/bootstrap.min.css')}}"> 

<link rel="stylesheet" href="{{asset('public/assets/modules/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/modules/fontawesome/css/all.min.css')}}">

<!-- CSS Libraries -->

<!-- Page Specific CSS Libraries -->
<link rel="stylesheet" href="{{asset('public/assets/modules/jquery-selectric/selectric.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/modules/jquery-selectric/selectric.css')}}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/components.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/css/components.css')}}">

@endif

@yield('additionalScripts')