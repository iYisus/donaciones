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
      <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/alerts/dist/sweetalert.css')}}">
      <!-- Animate.css -->
      <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
      <!-- Icomoon Icon Fonts-->
      <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
      <!-- Bootstrap  -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
      <!-- CSS Dashboard -->
      <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
      <!-- Data tables css -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
      <!-- Theme style  -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
       <!-- jQuery -->
       <script src="{{ asset('js/jquery.min.js') }}"></script>
       <!-- Bootstrap -->
       <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- Sweett Alert -->
      <script src="{{ asset('thirdparty/alerts/dist/sweetalert.min.js') }}"></script>
      <!-- ScritMain -->
      <script src="{{ asset('js/scriptMain.js') }}"></script>
      <!-- DataTables JS -->
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"></script>
    </head>
   <body>
      <div id="wrapper" data-spy="scroll" data-target="#spy" class="">
      <!-- Sidebar -->
      <div id="sidebar-wrapper" class="">
         <nav id="spy">
            <ul class="sidebar-nav nav">
               <li class="sidebar-brand active"> <a href="{{URL('/')}}" class="">
               <span class="fa fa-anchor solo">Inicio</span></a>
               </li>
               <li class=""> <a href="{{URL('citas')}}" data-scroll="" class="">
                  <span class="fa fa-anchor solo">Citas</span>
                  </a>
               </li>
               <li class=""> <a href="{{URL('eventos')}}" data-scroll="" class="">
                  <span class="fa fa-anchor solo">Eventos</span>
                  </a>
               </li>
               <li class=""> <a href="{{URL('medicos')}}" data-scroll="" class="">
                  <span class="fa fa-anchor solo">Medicos</span>
                  </a>
               </li>
               <li class=""> <a href="{{URL('especialidades')}}" data-scroll="" class="">
                  <span class="fa fa-anchor solo">Especialidades</span>
                  </a>
               </li>
               <li class=""> <a href="{{URL('logout')}}" data-scroll="" class="">
                  <span class="fa fa-anchor solo">Cerrar Sesión</span>
                  </a>
               </li>
            </ul>
         </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper" class="">
         <div class="col-sm-12 col-md-12 main" style='height: 100%;overflow: auto;'>
          <div class="fondo-opaco" style="display:none;"></div>
            <div class="spinner-wrapp" style="display:none;">
              <div class="loader"></div>
            </div>
            @yield('content')
         </div>
      </div>
  </body>
  
</html>