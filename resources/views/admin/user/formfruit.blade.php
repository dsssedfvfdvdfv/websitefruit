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
      @include("admin.content.editfruit")
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
  <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-storage.js"></script>
  <!-- TODO: Add SDKs for Firebase products that you want to use
       https://firebase.google.com/docs/web/setup#available-libraries -->
  <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-analytics.js"></script>

  <script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
  apiKey: "AIzaSyC4-fhZ5fHDS_lDK1JmU0i0AZFj1Nus8UI",
  authDomain: "webstorbook.firebaseapp.com",
  projectId: "webstorbook",
  storageBucket: "webstorbook.appspot.com",
  messagingSenderId: "716743241056",
  appId: "1:716743241056:web:0a92b159f815e6ae190205",
  measurementId: "G-0F84BJ8SSF"
};
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
  </script>
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
<script src="/js/firebase.js"></script>

</html>