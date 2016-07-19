@extends('layouts.master')

@section('title', 'Choose Game Winner')

@section('content')
<div class="container">
    <div class="row">
        <h1>Choose Winner</h1>

        <form id="newGame" method="POST" action="{{ url('game/winner/'.$game->game_id) }}">
            {{ csrf_field() }}
            
            @if (count($game->players()) == 2)
            <label>Select Winner
              <select name="winner_id">
                @foreach ($game->players() as $player)
                    @if ($player->player_id == $game->player_1_id)
                    <option value="{{ $game->player_1_id }}">{{ $player->name }}</option>
                    @elseif ($player->player_id == $game->player_2_id)
                    <option value="{{ $game->player_2_id }}">{{ $player->name }}</option>
                    @endif
                @endforeach
              </select>
            </label>
            @endif

            <button type="submit" id="submit" class="button">Submit</button>
            
        </form>
    </div>
</div>
@endsection