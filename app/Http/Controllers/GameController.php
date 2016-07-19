<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Game;
use App\Player;

class GameController extends Controller
{
    //
    public function newGamePage() {
        
        Log::debug("newGamePage()");
        
        return view('games.new');

        
    } //newGamePage
    
    //
    public function newGame(Request $request) {
        
        Log::debug("newGame(Request $request)");
        
        // Validate request; 2 players needed
        $this->validate($request, [
            'player_1_id' => 'required',
            'player_2_id' => 'required'
        ]);
        
        Log::debug("new game passes validation?");
        
        $game = new Game();
        $game->player_1_id = $request->player_1_id;
        $game->player_2_id = $request->player_2_id;
        $game->save();
        
        // Redirect to page to choose game winner
        $game_id = $game->game_id;
        Log::debug("new game id: " . $game_id);
        return redirect('/game/winner/'.$game_id);
    } //newGame
    
    //
    public function editGamePage($game_id) {
        Log::debug("editGamePage($game_id)");
        
        $game = Game::findOrFail($game_id);
        
        return view('games.edit', ['game' => $game]);
        
    } //editGamePage
    
    //
    public function editGame(Request $request, $game_id) {
        Log::debug("editGame(Request $request, $game_id)");
        
        // validate edit
        
        // Update game
        $game = Game::findOrFail($game_id);
        $game->winner_id = $request->winner_id;
        $game->player_id_1 = $request->player_id_1;
        $game->player_id_2 = $request->player_id_2;
        $game->update();
        
        // redirect to game page
        return redirect('game/get/'.$game_id);
    } //editGame

    //
    public function winnerGamePage($game_id) {
        Log::debug("winnerGamePage($game_id)");
        
        $game = Game::findOrFail($game_id);
        // get names of players
        //var_dump($game->players());

        return view('games.winner', ['game' => $game]);
        
    } //winnerGamePage
    
    //
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
            
            // Update winner's win count and loser's lose count
            // Needs checks so you can't spam a winner to increase their wins/losses
            // More checks so that if a winner changes they're count is updated
            // So we need a subtractWin and subtractLoss function, too
            if ($game->winner_id == $game->player_1_id) {
                $winner = Player::findOrFail($game->player_1_id);
                $loser = Player::findOrFail($game->player_2_id);
            } elseif ($game->winner_id == $game->player_2_id) {
                $winner = Player::findOrFail($game->player_2_id);
                $loser = Player::findOrFail($game->player_1_id);
            } else {
                Log::error("Something went wrong with the winner IDs!!!");
                // should break here because something went wrong
            }
            
            $winner->addWin();
            $loser->addLoss();
        }
        
        return redirect('game/get/'.$game_id);
        
    } //winnerGame
    
    //
    public function getGame($game_id) {
        Log::debug("getGame($game_id)");
        $game = Game::findOrFail($game_id);
        
        return view('games.get', ['game' => $game]);
    } //getGame
    
    //
    public function listGames() {

        Log::debug("listGames()");

        //$players = Player::all()->orderBy('wins', 'desc');
        $games = Game::all();
        
        return view('games.list', ['games' => $games]);
        
    } //listGames
    
    //
    public function deleteGame($game_id) {
        Log::debug("deleteGame($game_id)");
        
        $game = Game::findOrFail($game_id);
        // make sure game exists..
        $game->destroy();
        
        // redirect to list of games
        return redirect('game/list');
        
    } //deleteGame
}
