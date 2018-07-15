<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('front-end/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('front-end/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('front-end/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('front-end/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('front-end/css/payment.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->


<body>
<div class="container text-center">
    <div class="logo-404">
        <a href="index.html"><img src="{{URL::to('front-end/images/home/logo.png')}}" alt="" /></a>
    </div>
    <div class="content-404">
        <img src="{{URL::to('front-end/images/404/404.png')}}" class="img-responsive" alt="" />
        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="{{URL::to('/')}}">Bring me back Home</a></h2>
    </div>
</div>
<script src="{{asset('front-end/js/jquery.js')}}"></script>
<script src="{{asset('front-end/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front-end/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('front-end/js/price-range.js')}}"></script>
<script src="{{asset('front-end/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('front-end/js/main.js')}}"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>