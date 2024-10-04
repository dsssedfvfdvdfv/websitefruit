<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin')</title>
  @include('sweetalert::alert')
  @include('admin.user.library')
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
   

.selectdiv {
  position: relative;
  min-width: 200px;
  margin-top: 50px;
}


select::-ms-expand {
display: none;
}



.selectdiv select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  /* Add some styling */
  
  display: block;
  width: 100%;
  max-width: 320px;
  height: 50px;
  float: right;
  margin: 5px 0px;
  padding: 0px 24px;
  font-size: 16px;
  line-height: 1.75;
  color: #333;
  background-color: #ffffff;
  background-image: none;
  border: 1px solid #cccccc;
  -ms-word-break: normal;
  word-break: normal;
}
  </style>
</head>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    @include("admin.user.header")
    @include("admin.user.slidebar")
    <div class="content-wrapper" style="background: none;">
    @include("admin.content.pagestatistics")
    </div>
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="/templates/plugins/jquery/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jquery-validation -->
  <script src="/templates/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="/templates/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/templates/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->


</body>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



</html>