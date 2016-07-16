@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <h1>Manage Users</h1>
        @if (count($players) > 0)
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
                @foreach ($players as $player)
                 <?php $rankCounter = 1; ?>
                 <tr>
                    <td>{{ $rankCounter }}</td>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->player_id }}</td>
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