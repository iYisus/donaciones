@extends('layouts.master')
@section('content')
<div id="fh5co-services-section">
   <div class="container" id="acerca">
      <div class="row">
         <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box">
            <h3>{{ trans('informacion.titulo') }}</h3>
            <p>{{ trans('informacion.subtitulo') }}</p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-8 col-sm-12 col-xs-12 animate-box">
            <div class="services">
               <i class="icon-home"></i>
               <div class="desc"  style="text-align: justify;">
                  <p>
                     <b>El {{ trans('informacion.titulo') }} </b>
                     {{ trans('informacion.acerca') }}
                  </p>
               </div>
            </div>
         </div>
         <div class="col-md-4 hidden-xs hidden-sm animate-box">
            <div class="bg">
               <img src="images/fundadores.jpg"   alt="" class="img-inicio">
               <div class="overlay">
                  <h3><span>{{ trans('informacion.nuestros_fundadores') }}</span></h3>
               </div>
            </div>
         </div>
      </div>
      <div class="row padding-top">
         <div class="col-md-4 hidden-xs hidden-sm animate-box">
            <div class="bg">
               <img src="images/imagen1.jpg"   alt="" class="img-inicio">
               <div class="overlay">
                  <h3><span>{{ trans('informacion.ins_niño') }}</span></h3>
               </div>
            </div>
         </div>
         <div class="col-md-8 col-sm-12 col-xs-12 animate-box">
            <div class="services margin-top">
               <i class="icon-book"></i>
               <div class="desc"  style="text-align: justify;">
                  <p>
                     <b>{{ trans('informacion.objetivos_titulo') }}</b><br>
                     {{ trans('informacion.objetivos') }}
                  <div class="sangria">
                     a) {{ trans('informacion.objetivos_a') }}
                     <br>
                     b) {{ trans('informacion.objetivos_b') }}
                  </div>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class="row padding-top">
         <div class="col-md-8 col-sm-12 col-xs-12  animate-box">
            <div class="services margin-top">
               <i class="icon-users"></i>
               <div class="desc"  style="text-align: justify;">
                  <p><b>{{ trans('informacion.mision_titulo') }}</b>
                     {{ trans('informacion.mision') }}
                  </p>
               </div>
               <div class="desc"  style="text-align: justify;">
                  <p><b>{{ trans('informacion.vision_titulo') }}</b>
                     {{ trans('informacion.vision') }}
                  </p>
               </div>
            </div>
         </div>
         <div class="col-md-4 hidden-xs hidden-sm animate-box">
            <div class="bg">
               <img src="images/imagen2.jpg"   alt="" class="img-inicio">
               <div class="overlay">
                  <h3><span>{{ trans('informacion.ens_edc_form') }}</span></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="fh5co-work-section" class="fh5co-light-grey-section">
   <div class="container" id="eventos">
      <div class="row">
         <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box padding-top">
            <h2>{{ trans('informacion.titulo_evento') }}</h2>
            <p>{{ trans('informacion.subtitulo_evento') }} </p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 animate-box">
            <a href="#" class="item-grid text-center">
               <div class="image" style="background-image: url(images/image_1.jpg)"></div>
               <div class="v-align">
                  <div class="v-align-middle">
                     <h3 class="title">Nombre de evento</h3>
                     <h5 class="category">Descripción de los eventos</h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-4 animate-box">
            <a href="#" class="item-grid text-center">
               <div class="image" style="background-image: url(images/image_2.jpg)"></div>
               <div class="v-align">
                  <div class="v-align-middle">
                     <h3 class="title">Nombre de evento</h3>
                     <h5 class="category">Descripción de los eventos</h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-4 animate-box">
            <a href="#" class="item-grid text-center">
               <div class="image" style="background-image: url(images/image_3.jpg)"></div>
               <div class="v-align">
                  <div class="v-align-middle">
                     <h3 class="title">Nombre de evento</h3>
                     <h5 class="category">Descripción de los eventos</h5>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-12 text-center animate-box">
            <p><a href="#" class="btn btn-primary with-arrow">{{ trans('palabras.ver_eventos') }} <i class="icon-arrow-right"></i></a></p>
         </div>
      </div>
   </div>
</div>
<!-- <div id="fh5co-testimony-section">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box padding-top">
            <h2>Últimos Comentarios</h2>
            <p>Instituto de Previsión del Niño</p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 col-offset-0 to-animate">
            <div class="wrap-testimony animate-box">
               <div class="owl-carousel-fullwidth">
                  <div class="item">
                     <div class="testimony-slide active text-center">
                        <figure>
                           <img src="images/person1.jpg" alt="user">
                        </figure>
                        <blockquote>
                           <p>"Descripción de los comentarios"</p>
                        </blockquote>
                        <span>Autor del comentario</span>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimony-slide active text-center">
                        <figure>
                           <img src="images/person1.jpg" alt="user">
                        </figure>
                        <blockquote>
                           <p>"Descripción de los comentarios"</p>
                        </blockquote>
                        <span>Autor del comentario</span>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimony-slide active text-center">
                        <figure>
                           <img src="images/person1.jpg" alt="user">
                        </figure>
                        <blockquote>
                           <p>"Descripción de los comentarios"</p>
                        </blockquote>
                        <span>Autor del comentario</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div> -->
<!--<div id="fh5co-blog-section" class="fh5co-light-grey-section">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box padding-top">
            <h2>Recent from Blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6 col-sm-6 animate-box">
            <a href="#" class="item-grid">
               <div class="image" style="background-image: url(images/image_1.jpg)"></div>
               <div class="v-align">
                  <div class="v-align-middle">
                     <h3 class="title">We Create Mobile App</h3>
                     <h5 class="date"><span>June 23, 2016</span> | <span>4 Comments</span></h5>
                     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-sm-6 animate-box">
            <a href="#" class="item-grid">
               <div class="image" style="background-image: url(images/image_2.jpg)"></div>
               <div class="v-align">
                  <div class="v-align-middle">
                     <h3 class="title">Geographical App</h3>
                     <h5 class="date"><span>June 22, 2016</span> | <span>10 Comments</span></h5>
                     <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-12 text-center animate-box">
            <p><a href="#" class="btn btn-primary with-arrow">View More Post <i class="icon-arrow-right"></i></a></p>
         </div>
      </div>
   </div>
   </div>-->
<div id="fh5co-pricing-section">
   <div class="container" id="servicios">
      <div class="row">
         <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box padding-top">
            <h2>{{ trans('informacion.titulo_servicios') }}</h2>
            <p>{{ trans('informacion.subtitulo_servicios') }}</p>
         </div>
      </div>
      <div class="row">
         <div class="pricing animate-box">
         <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-header-grey">
                        <h1 class="card-heading">{{ trans('palabras.odontologia') }}</h1>
                     </div>
                     <div class="card-body">
                        <p class="card-p">
                           <b>Caracas</b><br>
                           Av. Francisco de Miranda, entre calle Lebrún y 2da Calle El Dorado. Urb.
                           Campo Rico. Petare <br>   
                           <b>Santa Teresa</b><br>
                           Santa Teresa, Esq. De Glorieta, Centro Residencial As de Oro, Mezzanina
                           Catia, Calle Maury, N° 12, Av. Sucre.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-header-grey">
                        <h1 class="card-heading">{{ trans('palabras.centro_psico') }}</h1>
                     </div>
                     <div class="card-body">
                        <p class="card-p">
                           <b>Caracas</b><br>
                           Av. Francisco de Miranda, entre calle Lebrún y 2da Calle El Dorado. Urb.
                           Campo Rico. Petare <br>   
                           <b>Santa Teresa</b><br>
                           Santa Teresa, Esq. De Glorieta, Centro Residencial As de Oro, Mezzanina
                           Catia, Calle Maury, N° 12, Av. Sucre.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-header-grey">
                        <h1 class="card-heading">{{ trans('palabras.pediatria') }}</h1>
                     </div>
                     <div class="card-body">
                        <p class="card-p">
                           <b>Santa Teresa</b><br>
                           Santa Teresa, Esq. De Glorieta, Centro Residencial As de Oro, Mezzanina
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="card">
                  <div class="card-content">
                     <div class="card-header-grey">
                        <h1 class="card-heading">{{ trans('palabras.oftalmologia') }}</h1>
                     </div>
                     <div class="card-body">
                        <p class="card-p">
                           <b>Santa Teresa</b><br>
                           Santa Teresa, Esq. De Glorieta, Centro Residencial As de Oro, Mezzanina
                        </p>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
<div class="fh5co-cta" style="background-image: url(images/imagen3.jpg);background-size:100% 100%" >
   <div class="overlay"></div>
   <div class="container">
      <div class="col-md-12 text-center animate-box">
         <h3>{{ trans('informacion.titulo_donar') }}</h3>
         <p><a href="#" class="btn btn-primary btn-outline with-arrow">{{ trans('palabras.donar') }}! <i class="icon-arrow-right"></i></a></p>
      </div>
   </div>
</div>
@endsection