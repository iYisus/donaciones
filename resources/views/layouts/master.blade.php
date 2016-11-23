<!-- <!DOCTYPE html>
   <html>
      <head>
         <title>@yield('IPN-VENEZUELA')</title>
         <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="description" content="Instituto de Previsión del niño" />
       <meta name="keywords" content="Instituto de Previsión del niño" />
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
<!-- TOASTR --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Theme style  -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- IPN-VZLA CSS -->
<link rel="stylesheet" href="{{ asset('css/ipnStyles.css') }}">

<!-- Modernizr JS -->
<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
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
<!-- TOASTR -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- MAIN JS TEMPLATE -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/scriptMain.js') }}"></script>
<script src="{{ asset('js/user.js') }}"></script>
<script type="text/javascript">
   $(function(){
      baseUrl = "{{URL('/')}}"
      scriptMain.init();
   })
</script>
@include('layouts.modals')
</head>
<body>
<div class="fondo-opaco" style="display:none;"></div>
<div class="spinner-wrapp" style="display:none;">
  <div class="loader"></div>
</div>
   <div id="fh5co-page">
      <header id="fh5co-header" role="banner">
         <div class="container">
            <div class="header-inner">
               <h1>
               <a href="{{URL('/')}}"><img src="{{ asset('images/logo.jpg') }}" class="logoIPN  hidden-sm hidden-xs "></a>
               <h1 class="hidden-lg hidden-md hidden-sm col-xs-12 ">
                  <center>IPN-Venezuela</center>
                  </a>
               </h1>
               <nav role="navigation">
                  <ul class="menu">
                     <li><a href="{{URL('/')}}">Inicio</a></li>
                        @if (Request::is('/'))
                         <li><a  href="#acerca">Acerca</a></li>
                         <li><a href="#eventos">Eventos</a></li>
                         <li><a href="#servicios">Servicios</a></li>
                         <li><a href="#contacto">Contacto</a></li>
                        @endif
                     <li>
                        @if(Auth::check()) 
                        <div class="btn-group">
                           <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{Auth::user()->nombre}}
                           <span class="caret"></span>
                           </button>
                           <ul id="sub-dropdown" class="dropdown-menu">
                              <li><a href="{{URL('perfil')}}" class="remove-background">Mi Perfil</a></li>
                              <li><a href="#" class="remove-background">Panel Administrativo</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="{{URL('logout')}}" class="remove-background">Cerrar Sesión</a></li>
                           </ul>
                        </div>
                        @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-modal">
                        Iniciar Sesión
                        </button>
                        @endif
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </header>
      <!-- Cotenedor general que heredaran las demas vistas -->
      <div class="container"></div>
      @yield('content')
      <!--################-->
      <footer id="fh5co-footer" role="contentinfo" >
         <div class="container" id="contacto">
            <div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
               <h3>Oficina Principal</h3>
               <p>Av. Francisco de Miranda, entre calle Lebrún y 2da Calle El Dorado. Urb.
                  Campo Rico. Petare. 
                  <br>
                  Teléfonos:
                  <br>
                  (212) 256.97.66 
                  <br>
                  (212) 256.81.67
                  <br>
                  (212) 256.92.82
               </p>
            </div>
            <div class="col-md-7 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
               <h3>Conctacto/Sugerencias</h3>
               <div class="form-group col-md-10">
                  <div class="email-error error-message" style="font-weight:500;font-size:16px;"></div>
                     <label for="nombre_email">Nombre</label>
                     <input type="input" class="form-control" name="nombre_email" id="nombre_email"
                        placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-10">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" name="email_send"  id="email_send"
                        placeholder="Tu email">
                  </div>
                  <div class="form-group col-md-10">
                     <label for="mensaje">Mensaje</label>
                     <textarea  cols="30" rows="5" name="mensaje_email" id="mensaje_email" class="form-control" placeholder="Tu mensaje">
                     </textarea>
                  </div>
                  <div class="form-group col-md-10" align="right">
                     <button  class="btn btn-primary" id="enviarMail">Enviar</button>
                  </div>
            </div>
            <div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
               <h3>Siguenos</h3>
               <ul class="fh5co-social">
                  <li><a href="https://twitter.com/IPNVzla" target="_blank"><i class="icon-twitter twitter-color"></i> Twitter</a></li>
                  <li><a href="https://www.facebook.com/Instituto-de-Previsión-del-Niño-1780454348900301/" target="_blank"><i class="icon-facebook facebook-color" ></i> Facebook</a></li>
                  <li><a href="https://plus.google.com/u/0/118352504854484493430" target="_blank"><i class="icon-google-plus googleplus-color"></i> Google Plus</a></li>
                  <li><a href="https://www.instagram.com/IPNVZLa/" target="_blank"><i class="icon-instagram" style="color:#e95950"></i> Instagram</a></li>
               </ul>
            </div>
         </div>
      </footer>
   </div>
   <script type="text/javascript">
   $(function(){
      $(".menu a").on("click",function(){
         var seccion = $(this).attr("href");
         $("body,html").animate({scrollTop:$(seccion).offset().top-100},2000)
         return false;
     })
   })
</script>
</body>
</html> 

