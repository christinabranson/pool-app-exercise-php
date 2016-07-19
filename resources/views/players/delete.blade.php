@extends('layouts.master')

@section('title', 'Delete Player')

@section('content')
<div class="container">
    <div class="row">
        @if (count($player) > 0)
        <h1>Delete Player: {{ $player->name }}</h1>

        <form id="deletePlayer" method="POST" action="{{ url('player/delete/'.$player->player_id) }}">
            {{ csrf_field() }}
            
            <p>Are you sure you want to delete <strong>{{ $player->name }}</strong>? This player has been in 
            <strong>{{ sizeof($player->games()) }}</strong> games and all those games will be deleted.</p>
            
            <button type="submit" id="submit" class="alert button">Submit</button>
            <input type="hidden" name="_method" value="DELETE">
            <p>Player created: {{ $player->created_at }}. Player last modified: {{ $player->updated_at }}.</p>
            
        </form>
        @endif
    </div>
</div>
@endsection