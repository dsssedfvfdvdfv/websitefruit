<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/templates/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="/templates/dist/css/adminlte.min.css">
  <!-- SweetAlert2 CSS -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" href="/css/edit.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <style>
    .content-wrapper {
      background: none;
      margin-bottom: 40px;
    }

    .content-wrapper .container-fluid {
      width: 78%;
    }
 
  </style>
  <title>Trang chi tiết</title>
  @include('page.body.library')

</head>

<body>


  <div class="humberger__menu__overlay"></div>

  @include('page.body.header')
  @include('page.body.pageprofile')
  @include('page.body.footer')

</body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jquery.slicknav.js"></script>
<script src="/js/mixitup.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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


</html>