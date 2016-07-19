@extends('layouts.master')

@section('title', 'Edit Pool Game')

@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Game</h1>

        <form id="newGame" method="POST" action="{{ url('game/new') }}">
            {{ csrf_field() }}
            
            <label>
                Player 1
                <input type="text" name="player_1_id" placeholder="Enter player id" />
            </label>
            
            <label>
                Player 2
                <input type="text" name="player_2_id" placeholder="Enter player id" />
            </label>
            
            <button type="submit" id="submit" class="button expanded">Start New Game</button>
        </form>
        <a href=" {{ url('game/winner/'.$game->game_id) }}" class="secondary button expanded">Select Winner</a>
    </div>
</div>
@endsection