@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @if (count($player) > 0)
        <h1>Edit Player</h1>

        <form id="editPlayer" method="POST" action="{{ url('player/edit/'.$player->player_id) }}">
            {{ csrf_field() }}
            
            <label>
                Player Name
                <input name="name" placeholder="Enter player name" value="{{ $player->name }}" />
            </label>
            
            <button type="submit" id="submit" class="button">Submit</button>
            
            <p>Player created: {{ $player->created_at }} Player last modified: {{ $player->updated_at }}</p>
            
        </form>
        @endif
    </div>
</div>
@endsection