<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css">
  <link rel="stylesheet" href="{{ URL::asset('css/jquery.fileuploader.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/thumbnails-theme.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/chocolat.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

  <script type="text/javascript" src="//js.growsurf.com/v1"></script>

  <meta name="keywords" content="kucni ljubimci, kućni ljubimci, prodaja kućnih ljubimaca, udomljavanje životinja, mačke na poklon, psi na poklon">
  {!! SEO::generate() !!}

  <meta property="og:image:width" content="450"/>
  <meta property="og:image:height" content="298"/>


  @include('partials.pixel')


</head>
<body>

  @include('partials.nav')
  @yield('content')

  @include('partials.adsense')
  @include('partials.footer')
  @include('partials.analytics')
  @include('partials.drift')

  <script src="{{ URL::asset('js/all.js') }}" charset="utf-8"></script>

  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59be64077028e9001126048f&product=inline-share-buttons"></script>

</body>
</html>
