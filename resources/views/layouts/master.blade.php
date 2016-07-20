<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pool App Exercise - @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
    
</head>
<body>
    <a class="show-for-medium" href="https://github.com/christinabranson/pool-app-exercise-php" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
    <nav class="top-bar">
        <div class="row">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Pool App Exercise
                    </a>
                </li>
                <li><a href="{{ url('/') }}">Leaderboard</a></li>
                <li><a href="{{ url('/game/new') }}">New Game</a></li>
                <li><a href="{{ url('/player/admin') }}">Manage Players</a></li>
            </ul>
        </div>
        </div>
    </nav>
    
    <div class="row">
        <div class="large-8 columns">
            @yield('content')
        </div>
        <div class="large-4 columns">
            <h2>Navigation</h2>
            <a href=" {{ url('game/new') }}" class="button expanded">New Game</a>
            <a href=" {{ url('game/list') }}" class="secondary button expanded">View All Games</a>
            <a href=" {{ url('player/new') }}" class="secondary button expanded">New Player</a>
            <a href=" {{ url('player/admin') }}" class="secondary button expanded">Manage Players</a>
            
            
        </div>
    </div>

    <script>
      $(document).foundation();
    </script>
</body>
</html>