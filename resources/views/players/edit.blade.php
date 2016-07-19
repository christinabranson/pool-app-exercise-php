@extends('layouts.master')

@section('title', 'Edit Player')

@section('content')
<div class="container">
    <div class="row">
        @if (count($player) > 0)
        <h1>Edit Player: {{ $player->name }}</h1>

        <form id="editPlayer" method="POST" action="{{ url('player/edit/'.$player->player_id) }}">
            {{ csrf_field() }}
            
            <label>
                Player Name
                <input type="text" name="name" placeholder="Enter player name" value="{{ $player->name }}" />
            </label>
            
            <button type="submit" id="submit" class="button expanded">Edit Player</button>
            
            <p>Player created: {{ $player->created_at }}. Player last modified: {{ $player->updated_at }}.</p>
            
        </form>
        @endif
    </div>
</div>
@endsection