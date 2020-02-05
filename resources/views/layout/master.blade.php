<!DOCTYPE html>
<html lang="en" ng-app="emrApp">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>OHFSRS-Online Health Facility Statistical Report System</title>

  <!-- General CSS Files -->
  @include('layout.styles')
  
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

    @media (min-width: 768px) {
      .modal-xlg {
        width: 90%;
        max-width:1200px;
      }
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

  

  @include('layout.scripts')
</body>
</html>