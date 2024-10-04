<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin')</title>
  @include('sweetalert::alert')
  @include('admin.user.library')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    @include("admin.user.header")

    @include("admin.user.slidebar")

    <div class="content-wrapper">
    @include("admin.content.maininvoice")
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

  <!-- Page specific script -->
</body>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</html>