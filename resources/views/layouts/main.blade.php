<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'contact app')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-icons/bootstrap-icons.css')}}">
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand text-uppercase" href="{{url('/')}}">
            <strong>Contact</strong> App
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse" id="navbar-toggler">
            @auth
                <ul class="navbar-nav">
                    {{-- {{request()->segment(1)}} --}}
                    {{-- {{request()->path()}} --}}
                    <li class="nav-item {{request()->segment(1)=='company' ? 'active' : ''}}"><a href="{{route('company.index')}}" class="nav-link">Companies</a></li>
                    <li class="nav-item {{request()->segment(1)=='contacts' ? 'active' : ''}}"><a href="{{route('contacts.index')}}" class="nav-link">Contacts</a></li>
                </ul>
            @endauth

          <ul class="navbar-nav ml-auto">
            @guest


            <li class="nav-item mr-2"><a href="{{route('login')}}" class="btn btn-outline-secondary">Login</a></li>
            <li class="nav-item"><a href="{{route('register')}}" class="btn btn-outline-primary">Register</a></li>
           @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{auth()->user()->name;}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="profile.html">Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <!-- content -->
   @yield('content')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
  </body>
</html>
