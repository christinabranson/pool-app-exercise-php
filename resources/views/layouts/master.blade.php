<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.css">
    
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.js"></script>

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>
<body>
    <nav class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Laravel
                    </a>
                </li>
                <li><a href="{{ url('/home') }}">Home</a></li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="dropdown menu" data-dropdown-menu>
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li>
                    <a href="#">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="menu vertical">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('content')

    <script>
      $(document).foundation();
    </script>
</body>
</html>