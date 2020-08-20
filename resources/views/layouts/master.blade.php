<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Akademik</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/adminlte/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" type="text/css" href="{{url('asset/css/toastr.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/jquery.dataTables.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .ck-editor__editable{
      min-height: 300px;
    }
  </style>
  @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  

 <!-- NAVBAR -->
 		@include('layouts.includes._navbar')
 		<!-- END NAVBAR -->
 		<!-- LEFT SIDEBAR -->
 		@include('layouts.includes._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="https://adminlte.io">SMK PGRI Rawalumbu</a>.</strong> All rights
    reserved.
  </footer>
 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script src="{{url('asset/js/sweetalert.min.js')}}"></script>
  <script src="{{url('asset/js/toastr.min.js')}}"></script>
  <script src="{{url('frontend/js/ckeditor.js')}}"></script>
  <script src="{{url('admin/assets/js/jquery.dataTables.js')}}"></script>
<script>
    @if(Session::has('sukses'))
    toastr.success("{{Session::get('sukses')}}", "Sukses")
    @endif
  </script>
  @yield('footer')
</body>
</html>