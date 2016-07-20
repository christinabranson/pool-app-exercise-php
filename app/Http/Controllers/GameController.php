<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Game;
use App\Player;

class GameController extends Controller
{
    // Get the page to create a game
    public function newGamePage() {
        
        Log::debug("newGamePage()");
        
        // get and return players for drop down list
        $players = Player::all();
        
        return view('games.new', ['players' => $players]);

    } //newGamePage
    
    // Create a game
    public function newGame(Request $request) {
        
        Log::debug("newGame(Request $request)");
        
        // Validate request; 2 players needed
        // TODO: Players can't be the same
        $this->validate($request, [
            'player_1_id' => 'required',
            'player_2_id' => 'required|different:player_1_id'
        ]);
        
        Log::debug("new game passes validation?");
        
        $game = new Game();
        $game->player_1_id = $request->player_1_id;
        $game->player_2_id = $request->player_2_id;
        // trying this out
        // getting SQLSTATE[23502]: Not null violation when deploying to heroku
        // winner will be set in winner function
        $game->winner_id = 0;
        $game->save();
        
        // Redirect to page to choose game winner
        $game_id = $game->game_id;
        Log::debug("new game id: " . $game_id);
        
        // return page to choose the winner of the game
        return redirect('/game/winner/'.$game_id);
    } //newGame
    
    // Get the page to edit a game
    public function editGamePage($game_id) {
        Log::debug("editGamePage($game_id)");
        
        $game = Game::findOrFail($game_id);
        
        // get and return players for drop down list
        $players = Player::all();

        return view('games.edit', ['game' => $game, 'players' => $players]);
        
    } //editGamePage
    
    // Edit a game
    public function editGame(Request $request, $game_id) {
        Log::debug("editGame(Request $request, $game_id)");
        
        // validate edit
        $this->validate($request, [
            'player_1_id' => 'required',
            'player_2_id' => 'required|different:player_1_id'
        ]);
        
        // Update game
        $game = Game::findOrFail($game_id);
        $game->player_id_1 = $request->player_id_1;
        $game->player_id_2 = $request->player_id_2;
        $game->update();
        
        // redirect to game page
        return redirect('game/get/'.$game_id);
    } //editGame

    // Get the page to select the winner
    public function winnerGamePage($game_id) {
        Log::debug("winnerGamePage($game_id)");
        
        $game = Game::findOrFail($game_id);

        return view('games.winner', ['game' => $game]);
        
    } //winnerGamePage
    
    // Select the winner for a game
    public function winnerGame(Request $request, $game_id) {
        Log::debug("winnerGame(Request $request, $game_id)");
        
        // Validate request; Winner needs to be selected
        $this->validate($request, [
            'winner_id' => 'required',
        ]);
        
        $game = Game::findOrFail($game_id);
        // Check if the winner has changed
        if ($game->winner_id != $request->winner_id) {
            $game->winner_id = $request->winner_id;
            $game->update();
        }
        
        return redirect('game/get/'.$game_id);
        
    } //winnerGame
    
    // Get information for a single game
    public function getGame($game_id) {
        Log::debug("getGame($game_id)");
        $game = Game::findOrFail($game_id);
        
        return view('games.get', ['game' => $game]);
    } //getGame
    
    // list all games
    public function listGames() {

        Log::debug("listGames()");

        $games = Game::all();
        
        return view('games.list', ['games' => $games]);
        
    } //listGames
    
    // Delete a game page
    public function deleteGamePage($game_id) {
        Log::debug("deleteGame($game_id)");
        
        $game = Game::findOrFail($game_id);
        
        return view('games.delete', ['game' => $game]);
        
    } //deleteGamePage
    
    // Delete a game
    public function deleteGame($game_id) {
        Log::debug("deleteGame($game_id)");
        
        $game = Game::findOrFail($game_id);
        $game->delete();
        
        // redirect to list of games
        return redirect('game/list');
        
    } //deleteGame
}
