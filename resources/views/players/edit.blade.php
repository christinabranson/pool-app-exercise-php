@extends('layouts.master')

@section('title', 'Edit Player')

@section('content')
<div class="container">
    <div class="row">
        <p><a href="{{ url('player/admin') }}">&larr; View all players</a></p>
    </div>
    <div class="row">
        @if (count($player) > 0)
        <h1>Edit Player: {{ $player->name }}</h1>
        
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

        <form id="editPlayer" method="POST" action="{{ url('player/edit/'.$player->player_id) }}">
            {{ csrf_field() }}
            
            <label>
                Player Name
                <input type="text" name="name" placeholder="Enter player name" value="{{ $player->name }}" />
            </label>
            
            <button type="submit" id="submit" class="button expanded">Edit Player</button>
            
            <p>Player created on {{ date('F j, Y, g:i a', strtotime($player->created_at)) }}. Player last edited on {{ date('F j, Y, g:i a', strtotime($player->updated_at)) }}.</p>
            
        </form>
        @endif
    </div>
</div>
@endsection