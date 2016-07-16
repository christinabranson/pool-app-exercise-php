@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @if (count($player) > 0)
        <h1>Get User: {{ $player->name }}</h1>
            <table>
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>Wins</th>
                  <th>Losses</th>
                </tr>
              </thead>
              <tbody>
                 <?php $rankCounter = 1; ?>
                 <tr>
                    <td>{{ $rankCounter }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->player_id }}</td>
                    <td>{{ $player->wins }}</td>
                    <td>{{ $player->losses }}</td>
                 </tr>
                 <?php $rankCounter++ ?>
              </tbody>
            </table>
        @else
            <p>No players yet! Why don't you <a href="{{ url('player/new') }}">add a player</a>?</p>
        @endif

    </div>
</div>
@endsection