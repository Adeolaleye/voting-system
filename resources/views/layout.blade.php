<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logo.png') }}">
  <link rel="icon" type="image/png" href="assets/img/logo.png">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="{{ asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  
  <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" type="stylesheet">

  
</head>

<body class="landing-page">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
    <div class="container">
      <a class="navbar-brand mr-lg-8" href="/">
        <img src="{{ asset('assets/img/logo.png')}}">
      </a>
      <a href="https://sgtv.tv/" class="navbar-toggler btn-neutral" target="_blank">
        <span class="nav-link-inner--text">LATEST NEWS</span>
      </a>
      @auth
            <a class="btn-neutral navbar-toggler btn-icon" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
              LOGOUT
            </a>
  
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                @csrf
                
            </form> 
      @endauth
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/">
                <img src="{{ asset('assets/img/logo.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="https://sgtv.tv/" target="_blank" class="btn btn-neutral btn-icon">
              <span class="nav-link-inner--text">Latest News</span>
            </a>
            @auth
            <a class="btn btn-neutral btn-icon" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                LOGOUT
            </a>
  
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                @csrf
                
            </form> 
            @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
     @yield ('content')

    <footer class="footer">
      <div class="container">
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2021 <a href="https://sgtv.tv/" target="_blank">SGTV</a> Made by <a href="https://consode.com/" target="_blank">Consode</a>
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-footer justify-content-end">
              <li class="nav-item">
                <a href="https://sgtv.tv/" class="nav-link" target="_blank">Latest News</a>
              </li>
              <li class="nav-item">
                <a href="https://sgtv.tv/about-us/" class="nav-link" target="_blank">About Us</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="{{ asset('assets/js/argon-design-system.min.js?v=1.2.0" type="text/javascript') }}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });
      $(document).ready(function() {
    $('#example').DataTable();
      } );
  </script>
</body>
</html>