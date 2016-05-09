<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/layout.css" rel="stylesheet">
  <title>@yield('title')</title>
</head>

<body>
  <div id="wrapper">
    <!-- header -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    @include('layout.header')
    <!-- header -->

    <!-- sidebar -->
    @include('layout.sidebar-login')
    <!-- sidebar -->
    </nav>
    <!-- collapsed -->

    <div id="page-wrapper">
      @yield('content')
    </div>
    <!-- content -->


  </div>
  <!-- wrapper  -->

  <div id="footer">
    <footer> @include('layout.footer') </footer>
  </div>

  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>
