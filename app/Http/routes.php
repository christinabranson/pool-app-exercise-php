<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// See /readme.md for documentation

// Leaderboard
Route::get('/', 'PlayerController@leaderboard');
Route::get('/leaderboard', 'PlayerController@leaderboard');

// Game management
Route::get('/game/new', 'GameController@newGamePage');
Route::post('/game/new', 'GameController@newGame');
Route::get('/game/edit/{game_id}', 'GameController@editGamePage');
Route::post('/game/edit/{game_id}', 'GameController@editGame');
Route::get('/game/winner/{game_id}', 'GameController@winnerGamePage');
Route::post('/game/winner/{game_id}', 'GameController@winnerGame');
Route::get('/game/get/{game_id}', 'GameController@getGame');
Route::get('/game/list', 'GameController@listGames');
Route::delete('/game/delete/{game_id}', 'GameController@deleteGame');

// Player management
Route::get('/player/new', 'PlayerController@newPlayerPage');
Route::post('/player/new', 'PlayerController@newPlayer');
Route::get('/player/edit/{player_id}', 'PlayerController@editPlayerPage');
Route::post('/player/edit/{player_id}', 'PlayerController@editPlayer');
Route::get('/player/get/{player_id}', 'PlayerController@getPlayer');
Route::get('/player/delete/{player_id}', 'PlayerController@deletePlayerPage');
Route::delete('/player/delete/{player_id}', 'PlayerController@deletePlayer');
Route::get('/player/admin', 'PlayerController@admin');
Route::get('/player/autocomplete/{search}', 'PlayerController@autocomplete');