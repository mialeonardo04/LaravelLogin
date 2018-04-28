<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('theme2/css/one-page-wonder.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('theme2/img/gears.png') }}">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">@yield('welcometitle')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
              @auth
                  <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Home</a>
                  </li>
              @else
                  <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                  </li>
              @endauth
            @endif
            </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Advanced Web Programming</h1>
          <h2 class="masthead-subheading mb-0">Ignasius Leonardo</h2>
          <a href="/register" class="btn btn-primary btn-xl rounded-pill mt-5">Try it and Register Now!</a>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

    <section>
      <div class="container">
        <div class="row align-items-center">
            @yield('content')
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">Copyright &copy; Ignasius Leonardo - K3515030</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('theme2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>
