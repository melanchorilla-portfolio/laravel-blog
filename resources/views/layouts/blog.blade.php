<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">
  <head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- mobile responsive meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=5"
    />
    <meta name="description" content="This is meta description" />
    <meta name="author" content="Themefisher" />

    <!-- theme meta -->
    <meta name="theme-name" content="logbook" />

    <!-- plugins -->
    <link
      rel="preload"
      href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2"
      style="font-display: optional"
    />

    <link href="/css/app.css" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap"
      media="screen"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
      integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/css/style.css" />

    <!--Favicon-->
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon" />
    <link rel="icon" href="/images/favicon.png" type="image/x-icon" />
  </head>

  <body>
    <!-- navigation -->
    <header class="sticky-top bg-white border-bottom border-default">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white">
          <a class="navbar-brand" href="/">
            <img
              class="img-fluid"
              width="150px"
              src="/images/logo.png"
              alt="LogBook"
            />
          </a>
          <button
            class="navbar-toggler border-0"
            type="button"
            data-toggle="collapse"
            data-target="#navigation"
          >
            <i class="fas fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>

              @if (Route::has('login'))
                @auth
                  <li class="nav-item">
                    <a class="nav-link" href="/admin">Dashboard</a>
                  </li>
                @else
                  @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                  </li>
                  @endif
                  <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                  </li>
                @endauth
              @endif
            </ul>

            <!-- search -->
            
          </div>
        </nav>
      </div>
    </header>
    <!-- /navigation -->

    @yield('content')

    <footer class="section-sm pb-0 border-top border-default">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-4 mb-4">
            <a class="mb-4 d-block" href="index.html">
              <img
                class="img-fluid"
                width="150px"
                src="/images/logo.png"
                alt="LogBook"
              />
            </a>
            <p>
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
              nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
              erat, sed diam voluptua.
            </p>
          </div>

          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <h6 class="mb-4">Quick Links</h6>
            <ul class="list-unstyled footer-list">
              <li><a href="{{ route('about') }}">About</a></li>
              @auth
                <li class="nav-item">
                  <a href="/admin">Dashboard</a>
                </li>
              @else
                @if (Route::has('register'))
                <li class="nav-item">
                  <a href="/register">Register</a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="/login">Login</a>
                </li>
              @endauth

            </ul>
          </div>

          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <h6 class="mb-4">Social Links</h6>
            <ul class="list-unstyled footer-list">
              <li><a href="#">facebook</a></li>
              <li><a href="#">twitter</a></li>
              <li><a href="#">linkedin</a></li>
              <li><a href="#">github</a></li>
            </ul>
          </div>

        </div>
        <div class="scroll-top">
         <a href="javascript:void(0);" id="scrollTop">
            <i class="fas fa-angle-up"></i>
         </a>
        </div>
        <div class="text-center">
          <p class="content">
            &copy; 2020 - Design &amp; Develop By
            <a href="https://themefisher.com/" target="_blank">Themefisher</a>
          </p>
        </div>
      </div>
    </footer>

    <!-- JS Plugins -->
    <script src="/js/app.js"></script>
    
    <!-- Main Script -->
    <script src="/js/script.js"></script>
  </body>
</html>
