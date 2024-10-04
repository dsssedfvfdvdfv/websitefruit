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
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12 col-lg-9 col-xl-7">
                            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Đăng ký tài khoản admin</h3>
                                    @include("admin.user.alert")
                                    <form action="/register/confirm" method="post">
                                    @csrf
                                        <div class="">
                                            <div class="form-outline">
                                                <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                                <label class="form-label" for="name">Họ và tên</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-outline">
                                                <input type="text" id="email" name="email" class="form-control form-control-lg" />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-outline">
                                                <input type="password" id="lastName" name="password" class="form-control form-control-lg" />
                                                <label class="form-label" for="lastName">Mật khẩu</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-outline">
                                                <input type="password" id="confirm" name="confirm" class="form-control form-control-lg" />
                                                <label class="form-label" for="confirm">Xác nhận mật khẩu</label>
                                            </div>
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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