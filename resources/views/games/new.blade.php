@extends('layouts.master')

@section('title', 'New Pool Game')

@section('content')
<div class="container">
    <div class="row">
        <h1>New Game</h1>

        <form id="newGame" method="POST" action="{{ url('game/new') }}">
            {{ csrf_field() }}

            <label>Select Player 1
              <select name="player_1_id">
                @foreach ($players as $player)
                    <option value="{{ $player->player_id }}">{{ $player->name }}</option>
                @endforeach
              </select>
            </label>
            
            <label>Select Player 2
              <select name="player_2_id">
                @foreach ($players as $player)
                    <option value="{{ $player->player_id }}">{{ $player->name }}</option>
                @endforeach
              </select>
            </label>
            
            <button type="submit" id="submit" class="button expanded">Start New Game</button>
            
        </form>
    </div>
</div>
@endsection