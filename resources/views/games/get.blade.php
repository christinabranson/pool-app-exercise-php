@extends('layouts.master')

@section('title', 'Game')

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
                  <th>Actions</th>
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
                            <td>
                                <a href="{{ url('game/edit/'.$game->game_id) }}" class="button expanded">Edit Players</a>
                                <a href="{{ url('game/winner/'.$game->game_id) }}" class="success button expanded">Select Winner</a>
                                <a href="{{ url('game/delete/'.$game->game_id) }}" class="alert button expanded">Delete Game</a>
                            </td>
                        </tr>

              </tbody>
            </table>
    </div>
     @endif
</div>
@endsection