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
                <!-- TODO: Make sure player rank works -->
                 <?php $rankCounter = 1; ?>
                 <tr>
                    <td>{{ $rankCounter }}</td>
                    <td><a href="{{ url('/player/get/'.$player->player_id) }}">{{ $player->name }}</a></td>
                    <td>{{ $player->wins }}</td>
                    <td>{{ $player->losses }}</td>
                 </tr>
                 <?php $rankCounter++ ?>
                @endforeach
              </tbody>
            </table>
        @else
            <p>No players yet! Why don't you <a href="{{ url('player/new') }}">add a player</a>?</p>
        @endif
    </div>
</div>
@endsection