<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GADERENTCAR</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href={{asset("assets/rent/css/bootstrap.css")}} />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href={{asset("assets/rent/css/style.css")}} rel="stylesheet" />
  <!-- responsive style -->
  <!-- <link href={{asset("assets/rent/css/style.css")}} rel="stylesheet" /> -->
  <link href={{asset("assets/rent/css/responsive.css")}} rel="stylesheet" />
  <!-- <link href="css/responsive.css" rel="stylesheet" /> -->
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @yield('header')

    <!-- end header section -->

    <!-- slider section -->
      @yield('slider')
    <!-- end slider section -->
  </div>

  <!-- about section -->
    @yield('about')
  <!-- end about section -->

  <!-- glass section -->
    @yield('glass')
  <!-- end glass section -->

  <!-- quality section -->
    @yield('quality')
  <!-- end quality section -->

  <!-- offer section -->
    @yield('offer')
  <!-- end offer section -->

  <!-- buy section -->
    @yield('buy')
  <!-- end buy section -->

  <!-- client section -->
    @yield('client')
  <!-- end client section -->

  <!-- contact section -->
    @yield('contact')
  <!-- end contact section -->

  <!-- info section -->
    @yield('info')
  <!-- end info section -->

  <!-- footer section -->
    @yield('footer')
  <!-- footer section -->
  <script type="text/javascript" src={{asset("assets/rent/js/bootstrap.js")}}></script>
  <script type="text/javascript" src={{asset("assets/rent/js/jquery-3.4.1.min.js")}}></script>
  <script type="text/javascript" src={{asset("assets/rent/js/custom.js")}}></script>

</body>

</html>