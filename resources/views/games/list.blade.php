@extends('layouts.master')

@section('title', 'Game List')

@section('content')
<div class="container">
    <div class="row">
        <p><a href="{{ url('/') }}">&larr; View leaderboard</a></p>
    </div>
    <div class="row">
        <h1>Game List</h1>
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
                @if (count($games) > 0)
                    @foreach($games as $game)
                        <tr>
                            <td><a href="{{ url('game/get/'.$game->game_id) }}">{{ $game->game_id }}</a></td>
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
                    @endforeach
                @endif
              </tbody>
            </table>
    </div>
</div>
@endsection