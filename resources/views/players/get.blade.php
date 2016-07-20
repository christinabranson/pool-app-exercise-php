@extends('layouts.master')

@section('title', 'Player Information')

@section('content')
<div class="container">
    <div class="row">
        <p><a href="{{ url('player/admin') }}">&larr; View all players</a></p>
    </div>
    <div class="row">
        @if (count($player) > 0)
        <h1>Get Player: {{ $player->name }}</h1>
            <table>
              <thead>
                <tr>
                  <th>Player Id</th>
                  <th>Name</th>
                  <th>Wins</th>
                  <th>Losses</th>
                </tr>
              </thead>
              <tbody>
                 <tr>
                    <td>{{ $player->player_id }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->wins() }}</td>
                    <td>{{ $player->losses() }}</td>
                 </tr>
              </tbody>
            </table>
    </div>
    <div class="row">
        <h2>Manage Player</h2>
        <div class="medium-6 columns">
            <a class="success button expanded" href="{{ url('/player/edit/'.$player->player_id) }}">Edit Player</a>
        </div>
        <div class="medium-6 columns">
            <a class="alert button expanded" href="{{ url('/player/delete/'.$player->player_id) }}">Delete Player</a>
        </div>    
    </div>
    <div class="row">
        <h2>{{ $player->name }}'s Games</h2>
            <table>
              <thead>
                <tr>
                  <th>Game Id</th>
                  <th>Player 1</th>
                  <th>Player 2</th>
                  <th>Winner</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @if (count($player->games()) > 0)
                    @foreach($player->games() as $game)
                        <tr>
                            <td><a href="{{ url('game/get/'.$game->game_id) }}">{{ $game->game_id }}</a></td>
                            <td><a href="{{ url('player/get/'.$game->player_1_id) }}">{{ $game->player1()->name }}</a></td>
                            <td><a href="{{ url('player/get/'.$game->player_2_id) }}">{{ $game->player2()->name }}</a></td>
                            @if (isset($game->winner()->name))
                                <td><a href="{{ url('player/get/'.$game->winner_id) }}">{{ $game->winner()->name }}</a></td>
                            @else
                                <td>No winner yet! Choose winner <a href="{{ url('game/winner/'.$game->game_id) }}">here</a>.</td>
                            @endif
                            <td>{{ $game->created_at }}</td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
    </div>

            
        @else
            <p>No players yet! Why don't you <a href="{{ url('player/new') }}">add a player</a>?</p>
    </div>
        @endif


    
    
</div>
@endsection