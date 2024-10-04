<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang thanh toán</title>
    @include('page.body.library')
    <style>
        .nice-select{
            height: 45px;
        }
        .nice-select .list{
            max-height: 300px;
            overflow: auto;
        }
    </style>
</head>

<body>

   
    <div class="humberger__menu__overlay"></div>
  
    @include('page.body.header')
    @include('page.body.pagecheckout')
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


</html>