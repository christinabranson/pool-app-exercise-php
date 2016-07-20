@extends('layouts.master')

@section('title', 'Delete Game')

@section('content')
<div class="container">
    <div class="row">
        <p><a href="{{ url('game/list') }}">&larr; View all games</a></p>
    </div>
    @if (count($game) == 1)
    <div class="row">
        <h1>Game {{ $game->game_id }}: {{ $game->player1()->name }} vs {{ $game->player2()->name }}</h1>
    </div>
    <div class="row">
            <table>
              <thead>
                <tr>
                  <th>Id</th>
                  <th width="100">Player 1</th>
                  <th width="100">Player 2</th>
                  <th width="100">Winner</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                        <tr>
                            <td>{{ $game->game_id }}</td>
                            <td><a href="{{ url('player/get/'.$game->player_1_id) }}">{{ $game->player1()->name }}</a></td>
                            <td><a href="{{ url('player/get/'.$game->player_2_id) }}">{{ $game->player2()->name }}</a></td>
                            @if (isset($game->winner()->name))
                                <td><a href="{{ url('player/get/'.$game->winner_id) }}">{{ $game->winner()->name }}</a></td>
                            @else
                                <td>No winner yet! Choose winner <a href="{{ url('game/winner/'.$game->game_id) }}">here</a>.</td>
                            @endif
                            <td>{{ date('F j, Y, g:i a', strtotime($game->created_at)) }}</td>
                        </tr>

              </tbody>
            </table>
            
        <form id="deleteGame" method="POST" action="{{ url('game/delete/'.$game->game_id) }}">
            {{ csrf_field() }}
            
            <p>Are you sure you want to delete this game? This action cannot be undone.</p>
            
            <button type="submit" id="submit" class="alert button">Delete Game</button>
            <input type="hidden" name="_method" value="DELETE">
        </form>
    </div>
     @endif
</div>
@endsection