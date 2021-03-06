<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('ui/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('ui/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('ui/css/style.min.css')}}" rel="stylesheet">

  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 100vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow-none h-menu scrolling-navbar" id="mainNav">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="/">
          <h2 class="display-5 font-weight-bold text-logo">Factories <span class="text-warning">Land</span></h2>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons ml-auto">
          @if(Auth::guard('customer')->check())
          <li class="nav-item">
            <a class="nav-link waves-effect" href="{{route('product.viewCart')}}">
              <span class="badge red z-depth-1 mr-1"> {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }} </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Cart </span>
            </a>
          </li>
          @endif
          @if( Auth::guard('customer')->check() )
          <li class="nav-item">
            <a href="{{ route('ui.orders') }}" class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-first-order mr-2"></i>Orders
            </a>
          </li>
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('customer')->user()->name }}</span>
                  <img class="rounded-circle" src="{{ Auth::guard('customer')->user()->photo }}" style="width: 25px;height: 25px">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{ route('ui.profile') }}">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                  </a>
              </div>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link btn btn-lg bg-primary text-white" href="{{ route('ui.get.login') }}"><i class="fas fa-door-open"></i> Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-lg text-white bg-warning" href="{{ route('ui.signup') }}"><i class="fas fa-box-open"></i> Sign up</a>
          </li>
          @endif

        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->
