@extends('layouts.master')

@section('title', 'Edit Pool Game')

@section('content')
<div class="container">
    <div class="row">
        <p><a href="{{ url('game/list') }}">&larr; View all games</a></p>
    </div>
    <div class="row">
        <h1>Edit Game</h1>
    
        @if (count($errors) > 0)
            <div class="alert callout">
                <h3>Error!</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="newGame" method="POST" action="{{ url('game/new') }}">
            {{ csrf_field() }}
            
            <label>Select Player 1
              <select name="player_1_id">
                @foreach ($players as $player)
                    @if ($game->player_1_id == $player->player_id)
                        <option selected value="{{ $player->player_id }}">{{ $player->name }}</option>
                    @else
                        <option value="{{ $player->player_id }}">{{ $player->name }}</option>
                    @endif
                @endforeach
              </select>
            </label>
            
            <label>Select Player 2
              <select name="player_2_id">
                @foreach ($players as $player)
                    @if ($game->player_2_id == $player->player_id)
                        <option selected value="{{ $player->player_id }}">{{ $player->name }}</option>
                    @else
                        <option value="{{ $player->player_id }}">{{ $player->name }}</option>
                    @endif
                @endforeach
              </select>
            </label>
            
            <button type="submit" id="submit" class="button expanded">Edit Players</button>
        </form>
        <a href=" {{ url('game/winner/'.$game->game_id) }}" class="secondary button expanded">Select Winner</a>
    </div>
</div>
@endsection