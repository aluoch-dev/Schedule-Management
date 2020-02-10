<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts-->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" {{ asset('/css/main.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
      <!--content wrapper--> 
      <div id="content-wrapper">
          <div class="container-fluid">
            <main class="py-4">
              @yield('content')
            </main>
          </div>
      </div><!-- /.content-wrapper -->

    
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset ('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('/js/demo/chart-area-demo.js') }}"></script>

</body>

</html>
