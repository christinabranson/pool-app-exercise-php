@extends('layouts.master')

@section('title', 'New Player')

@section('content')
<div class="container">
    <div class="row">
        <h1>New Player</h1>

        <form id="newPlayer" method="POST" action="{{ url('player/new') }}">
            {{ csrf_field() }}
            
            <label>
                Player Name
                <input type="text" name="name" placeholder="Enter player name" />
            </label>
            
            <button type="submit" id="submit" class="button expanded">Submit</button>
            
        </form>
    </div>
</div>
@endsection