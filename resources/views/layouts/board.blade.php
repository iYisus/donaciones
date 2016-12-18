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
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/
      dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"></script>
    <style>
          .navbar-login
          {
              width: 305px;
              padding: 10px;
              padding-bottom: 0px;
          }

          .navbar-login-session
          {
              padding: 10px;
              padding-bottom: 0px;
              padding-top: 0px;
          }

          .icon-size
          {
              font-size: 87px;
          }
      </style>
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
               @if(Auth::user()->FK_ROL_ID == 3)
                 <li class=""> <a href="{{URL('usuarios')}}" data-scroll="" class="">
                    <span class="fa fa-anchor solo">Usuarios</span>
                    </a>
                 </li>
               @endif
              </ul>
         </nav>
      </div>

      <!-- Page content -->
      <div id="page-content-wrapper" style="min-height: 900px !important;">
      <div class="navbar navbar-default " role="navigation">
      <div class="container"> 
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="fa-icon icon-user"></span>
                        <strong>{{Auth::user()->nombre}}</strong>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="fa-icon icon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <span class="text-left"><strong>{{Auth::user()->nombre." ".Auth::user()->apellido}}</strong>
                                        </span>
                                        <br>
                                        <span class="text-left small">
                                        @if(Auth::user()->FK_ROL_ID == 2)
                                            Usuario Administrador
                                        @else
                                            Usuario Root
                                        @endif
                                        </span>
                                        <br>
                                        <span class="text-left">

                                            <a href="{{URL('perfil')}}" class="btn btn-primary btn-block btn-sm">Mi Perfil</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider navbar-login-session-bg"></li>
                        <li><a href="{{URL('logout')}}">Cerrar Sesión <span class="fa-icon icon-sign-out pull-right"></span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </div>
         <div class="col-sm-12 col-md-12 main">
          <div class="fondo-opaco" style="display:none;"></div>
            <div class="spinner-wrapp" style="display:none;">
              <div class="loader"></div>
            </div>
            @yield('content')
         </div>
      </div>
  </body>
  
</html>