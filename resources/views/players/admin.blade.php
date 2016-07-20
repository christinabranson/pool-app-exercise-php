@extends('layouts.master')

@section('title', 'Manage Players')

@section('content')
<div class="container">
    <div class="row">
        <h1>Manage Users</h1>
        @if (count($players) > 0)
            <table>
              <thead>
                <tr>
                  <th>Player Id</th>
                  <th>Name</th>
                  <th>Wins</th>
                  <th>Losses</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($players as $player)
                 <tr>
                    <td>{{ $player->player_id }}</td>
                    <td><a href="{{ url('/player/get/'.$player->player_id) }}">{{ $player->name }}</a></td>
                    <td>{{ $player->wins() }}</td>
                    <td>{{ $player->losses() }}</td>
                    <td>
                        <a class="button" href="{{ url('/player/get/'.$player->player_id) }}">View Player Info</a>
                        <a class="success button" href="{{ url('/player/edit/'.$player->player_id) }}">Edit Player</a>
                        <a class="alert button" href="{{ url('/player/delete/'.$player->player_id) }}">Delete Player</a>
                    </td>
                 </tr>
                @endforeach
              </tbody>
            </table>
        @else
            <p>No players yet!</p>
        @endif
        <p><a href="{{ url('player/new') }}" class="button expanded">Add a player</a></p>

    </div>
</div>
@endsection