@extends('layouts.master')

@section('title', 'Leaderboard')

@section('content')
<div class="container">
    <div class="row">
        <h1>Leaderboard</h1>
        @if (count($players) > 0)
            <table class="hover">
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Name</th>
                  <th>Wins</th>
                  <th>Losses</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($players as $player)
                 <tr>
                    <td>{{ $player->getRank() }}</td>
                    <td><a href="{{ url('/player/get/'.$player->player_id) }}">{{ $player->name }}</a></td>
                    <td>{{ $player->wins() }}</td>
                    <td>{{ $player->losses() }}</td>
                 </tr>
                @endforeach
              </tbody>
            </table>
        @else
            <p>No players yet! Why don't you <a href="{{ url('player/new') }}">add a player</a>?</p>
        @endif
    </div>
</div>
@endsection