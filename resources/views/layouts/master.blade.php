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
    </style>
   </head>
   <body>
      <div id="fh5co-page">
         <header id="fh5co-header" role="banner">
            <div class="container">
               <div class="header-inner">
                <h1><a href="#"><img src="{{ asset('images/logo.jpg') }}" class="logoIPN"></a></h1>
                  <nav role="navigation">
                     <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Acerca</a></li>
                        <li><a href="#">Eventos</a></li>
                        <li><a href="#">Comentarios</a></li>
                        <li><a href="#">Contactanos</a></li>
                        <li class="cta"><a href="#">Iniciar Sesion</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </header>
         <!-- Cotenedor general que heredaran las demas vistas -->
         <div class="container"></div>
         @yield('content')
         <!--################-->
         <footer id="fh5co-footer" role="contentinfo">
            <div class="container">
               <div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                  <h3>Encuentranos</h3>
                  <p>Av. Francisco de Miranda, entre calle Lebrún y 2da Calle El Dorado. Urb.
                     Campo Rico. Petare. 
                     <br>
                     Teléfonos:
                     (212) 256.97.66, 256.81.67, 256.92.82
                  </p>
               </div>
               <div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                  <h3>Nuestros Servicios</h3>
                  <ul class="float">
                     Aquí irán los servicios que ofrece la institución.
                  </ul>
               </div>
               <div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                  <h3>Siguenos</h3>
                  <ul class="fh5co-social">
                     <li><a href="#"><i class="icon-twitter twitter-color"></i> Twitter</a></li>
                     <li><a href="#"><i class="icon-facebook facebook-color" ></i> Facebook</a></li>
                     <li><a href="#"><i class="icon-google-plus googleplus-color"></i> Google Plus</a></li>
                     <li><a href="#"><i class="icon-instagram" style="color:#e95950"></i> Instagram</a></li>
                  </ul>
               </div>
            </div>
         </footer>
      </div>
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
   </body>
</html>