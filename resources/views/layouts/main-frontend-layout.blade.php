<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
     
    <title> ISFAD @yield('title', 'isfad')</title>
    {{-- <meta name="author" content="themesflat.com"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/stylesheets/bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/stylesheets/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/stylesheets/responsive.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/stylesheets/colors/color1.css') }}" id="colors">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/stylesheets/animate.css') }}">

    {{-- custom css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/stylesheets/custom.css') }}">

  <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/png" />
    
    <link href="#" rel="shortcut icon">
    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->
    @yield('autres_css')
  </head>

  <body class="header-sticky">
  {{-- top nav --}}
  @include('includes/frontend/top-nav')

  @include('includes/frontend/header')

  @yield('content')    

  @include('includes/frontend/footer')
   {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
   <script type="text/javascript" src="{{ asset('frontend/javascript/jquery.min.js') }}"></script>

<script type="text/javascript" src=" {{ asset('frontend/javascript/bootstrap.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery.easing.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jQuery.verticalCarousel.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/owl.carousel.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/parallax.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery-waypoints.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery.tweet.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery.matchHeight-min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery-validate.js') }} "></script>

<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery.themepunch.tools.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery.themepunch.revolution.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/slider.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery.cookie.js') }} "></script>

<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdo2kVH0HANk9Q4jlX1mLTNE3bdKljuVg&libraries=drawing">
</script>
<script type="text/javascript" src=" {{ asset('frontend/javascript/jquery.panmap.js') }} "></script>

<script>
$(function(){
    $("#map").panmap({
  height:"300px",
  data:{
     center:{lat:9.544122,lng:-13.677610,zoom:15},
      objects:[
      {
      "type":"marker",
      "strokeColor":"#FF0000",
      "strokeOpacity":"1.0",
      "strokeWeight":"2",
      "fillColor":"#FF0000",
      "fillOpacity":"0.35",
      "title":"ISFAD",
      "content":"INSTITUT SUPERIEUR DE FORMATION A DISTANCE",
    "lat":9.544122,
      "lng":-13.677610,
      "radius":43.67528289531
      }
      ]
  },
  change: function(event){
      $("#events").val($("#events").val() + "\n [change]: "+ event.type+"...");
  }
    });
    
    $("#editable").change(function(){
  $("#map").panmap("edit",$(this).attr("checked")?true:false);
    });
    $("#getvalue").click(function(){
  $("#result").val(JSON.stringify($("#map").panmap("value"),null,4));
    });

});
</script>





<script type="text/javascript" src=" {{ asset('frontend/javascript/main.js') }} "></script>
<script type="text/javascript" src=" {{ asset('frontend/custom/app.js') }} "></script>

        @yield('autres_scripts')

  </body>
</html>
  