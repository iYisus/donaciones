<!DOCTYPE html>
<html>
    <head>
        <title>@yield('IPN-VENEZUELA')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Instituto de prevension del niño" />
        <meta name="keywords" content="Instituto de prevension del niño" />
        <meta name="author" content="" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700" rel="stylesheet">
        <!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <!-- CSS for dashboard -->
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <!-- Flexslider  -->
        <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <!-- Theme style  -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- IPN-VZLA CSS -->
        <link rel="stylesheet" href="{{ asset('css/ipnStyles.css') }}">
        <!-- Modernizr JS -->
        <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
        <!-- Sweett Alert -->
        <script src="{{ asset('thirdparty/alerts/dist/sweetalert.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/alerts/dist/sweetalert.css')}}">
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            p{
                margin-bottom: 10px;
            }
            .sangria{
                padding-left: 15px;
            }
            .trDisabled{
                border-left: solid 3px red
            }
            .btn-registrar{
                background-color: #4db6ac !important;
                color: white !important;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid" data-offset="50" data-spy="scroll" data-target="#sidebarmenu">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="col-sm-3 col-md-2 sidebar-offcanvas" data-offset="60" id="sidebar" role="navigation">
                    <div id="sidebarmenu">
                        <!-- Info usuario -->
                        <ul class="nav nav-sidebar" style='padding-top: 21%;color:white;padding-bottom: 13%;border-right: solid 6px #b2dfdb'>
                            <li>
                                <div class="row">
                                    <div class="center-block">
                                        <img class="profile-img" src="{{ asset('images/user-male-icon.png') }}">
                                    </div>
                                </div>
                            </li>
                            <li class='def-user' >Nombre de usuario</li>
                            <li class='def-user labl-rol'>Administrador</li>
                        </ul>
                        <!-- Eventos -->
                        <ul class="nav nav-sidebar" style='border-right: 6px solid #80cbc4;'>
                            <li><a class='sideTitles'><i class="icon-calendar "></i> Eventos</a></li>
                            <li><a href="#sec1">Administrar eventos</a></li>
                        </ul>
                        <!-- Citas Médicas -->
                        <ul class="nav nav-sidebar" style='border-right: 6px solid #4db6ac;'>
                            <li><a class='sideTitles'><i class="icon-cog"></i> Administrar citas</a></li>
                            <li><a href="#sec1">Citas</a></li>
                            <li><a href="#sec2">Historias</a></li>
                            <li><a href="#sec1">Médicos</a></li>
                            <li><a href="#sec2">Especialidades</a></li>
                        </ul>
                        <!-- Sugerencias -->
                        <ul class="nav nav-sidebar" style='border-right: 6px solid #26a69a;'>
                            <li><a class='sideTitles'><i class="icon-envelope "></i> Sugerencias</a></li>
                            <li><a href="#sec1">Ver sugerencias</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10" style="height:7%;background-color: #f1f1f1;padding: 15px;border-bottom: 2px solid #e6e6e6; "> 
                    <header id="fh5co-header" class='headdash' role="banner">
                        <span style='float:right;'>
                            <a style='padding-right: 23px;'>Cerrar sesión </a>
                        </span>
                    </header>
                </div>
                <div class="col-sm-9 col-md-10 main" style='height: 90%;overflow: auto;'>
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- <footer>
            <p class="pull-right">©2014 Company</p>
        </footer> -->
    </body>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <!-- MAIN JS -->
    <script src="{{ asset('js/main.js') }}"></script>
</html>