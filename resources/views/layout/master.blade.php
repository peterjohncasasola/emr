<!DOCTYPE html>
<html lang="en" ng-app="emrApp">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>OHFSRS-Online Health Facility Statistical Report System</title>

  <!-- General CSS Files -->

  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/assets/modules/bootstrap/css/bootstrap.min.css')}}"> 
  
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Page Specific CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/modules/jquery-selectric/selectric.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('public/asset('assets/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('public/asset('assets/css/components.css')}}">
  <style type="text/css">
    label{
      color:black;
    }
    
    .fade.in {
      opacity: 1;
    }

    .modal.in .modal-dialog {
      -webkit-transform: translate(0, 0);
      -o-transform: translate(0, 0);
      transform: translate(0, 0);
    }

    .modal-backdrop.in {
      filter: alpha(opacity=50);
      opacity: .5;
    }
    
  </style>

  <base href="/">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <!-- Header -->
      @include('layout.header')
      <!-- Header -->
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <!-- Content Header (Page header) -->
        @yield('content')
      <div ui-view></div>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>  
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>

  <script src="assets/js/custom.js"></script>=

  @include('layout.scripts')
</body>
</html>