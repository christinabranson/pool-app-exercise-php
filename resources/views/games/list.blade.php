@extends('layouts.master')

@section('title', 'Game List')

@section('content')
<div class="container">
    <div class="row">
        <h1>Game List</h1>
    </div>
    <div class="row">
            <table>
              <thead>
                <tr>
                  <th>Game Id</th>
                  <th>Player 1</th>
                  <th>Player 2</th>
                  <th>Winner</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (count($games) > 0)
                    @foreach($games as $game)
                        <tr>
                            <td>{{ $game->game_id }}</td>
                            <td>{{ $game->player1()->name }}</td>
                            <td>{{ $game->player2()->name }}</td>
                            @if (isset($game->winner()->name))
                                <td>{{ $game->winner()->name }}</td>
                            @else
                                <td>No winner yet! Choose winner <a href="{{ url('game/winner/'.$game->game_id) }}">here</a>.</td>
                            @endif
                            <td>{{ $game->created_at }}</td>
                            <td>
                                <a href="{{ url('game/edit/'.$game->game_id) }}" class="button">Edit Players</a>
                                <a href="{{ url('game/winner/'.$game->game_id) }}" class="success button">Select Winner</a>
                                <a href="{{ url('game/delete/'.$game->game_id) }}" class="alert button">Delete Game</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
    </div>
</div>
@endsection