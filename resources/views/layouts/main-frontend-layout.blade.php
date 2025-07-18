<!DOCTYPE html>
<html lang="fr">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>@yield('title') | Diari-web</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('template-front/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ asset('template-front/plugins/fontawesome/css/all.min.css')}}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ asset('template-front/plugins/animate-css/animate.css')}}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ asset('template-front/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('template-front/plugins/slick/slick-theme.css')}}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ asset('template-front/plugins/colorbox/colorbox.css')}}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ asset('template-front/css/style.css')}}">

  <style>
    #banner-area .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Noir avec opacité à 40% */
    z-index: 1;
}
  </style>

</head>
<body>
  <div class="body-inner">
    @include('includes/frontend/top_and_nav_bar')
    @yield('content')
    @include('includes/frontend/footer')




 
  <!-- initialize jQuery Library -->
  <script src="{{ asset('template-front/plugins/jQuery/jquery.min.js')}}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{ asset('template-front/plugins/bootstrap/bootstrap.min.js')}}" defer ></script>
  <!-- Slick Carousel -->
  <script src="{{ asset('template-front/plugins/slick/slick.min.js')}}"></script>
  <script src="{{ asset('template-front/plugins/slick/slick-animation.min.js')}}"></script>
  <!-- Color box -->
  <script src="{{ asset('template-front/plugins/colorbox/jquery.colorbox.js')}}"></script>
  <!-- shuffle -->
  <script src="{{ asset('template-front/plugins/shuffle/shuffle.min.js')}}" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="{{ asset('template-front/plugins/google-map/map.js')}}" defer></script>

  <!-- Template custom -->
  <script src="{{ asset('template-front/js/script.js')}}"></script>

  </div><!-- Body inner end -->
  </body>

  </html>