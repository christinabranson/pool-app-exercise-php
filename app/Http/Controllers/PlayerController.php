<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;
use App\Player;

class PlayerController extends Controller
{
    // Get and return leaderboard
    public function leaderboard() {
        
        Log::debug("leaderboard");
        
        $players = Player::all();
        
        // sort all players by wins and losses
        $sortedPlayers = $players->sort(function (Player $player1, Player $player2) {
            if ( $player1->wins() > $player2->wins() ) {
                return -1;
            } elseif ( $player1->wins() < $player2->wins() ) {
                return 1;
            } elseif (  $player1->wins() == $player2->wins() ) {
                if ( $player1->losses() < $player2->losses() ) {
                    return -1;
                } elseif ( $player1->losses() > $player2->losses() ) {
                    return 1;
                } elseif ( $player1->losses() == $player2->losses() ) {
                    return 0;
                }
            }
            return 0;
        });
        
        // add rank to display on leaderboard
        $rank = 1;
        foreach($sortedPlayers as $player) {
            $player->setRank($rank);
            $rank++;
        }

        return view('players.leaderboard', ['players' =>  $sortedPlayers]);
        
    } //leaderboard
    
    // Return view to create a new player
    public function newPlayerPage() {
        
        Log::debug("newPlayerPage()");
        
        return view('players.new');
    } //newPlayerPage
    
    // Add a new player
    public function newPlayer(Request $request) {
        
        Log::debug("newPlayer(Request $request)");
        
        
        // Validate name, required
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $player = new Player();
        $player->name = $request->name;
        $player->save();
        
        return redirect('/');
    } //newPlayer
    
    // Return view to edit player
    public function editPlayerPage($player_id) {
        $player = Player::find($player_id);
        return view('players.edit', ['player' => $player]);
    } //newPlayerPage
    
    
    // Edit a player
    public function editPlayer(Request $request, $player_id) {
        
        Log::debug("editPlayer(Request $request, $player_id)");
        
        // Validate name, required
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        
        $player = Player::find($player_id);
        $player->name = $request->name;
        $player->update();
        
        // Return back to edit page
        return redirect('player/edit/'.$player_id);
        
    } //editPlayer
    
    
    // Get a player
    public function getPlayer($player_id) {
        
        Log::debug("getPlayer($player_id)");
        
        $player = Player::findOrFail($player_id);
        
        //var_dump($player->games());
        return view('players.get', ['player' => $player]);
    } // getPlayer
    
    // Get delete a player page
    public function deletePlayerPage($player_id) {
        Log::debug("deletePlayer($player_id)");
        
        $player = Player::findOrFail($player_id);
        
        //var_dump($player->games());
        return view('players.delete', ['player' => $player]);
    } // deletePlayerPage
    
    // Delete a player
    public function deletePlayer($player_id) {
        
        Log::debug("deletePlayer($player_id)");
        
        $player = Player::find($player_id);
        
        // Find and destroy games the player has been a part of
        $games = $player->games();
        foreach ($games as $game) {
            Log::debug("Deleting game: " . $game->game_id);
            $game->delete();
        }
        
        // TODO: What should I do with a player's games once they've been deleted
        $player->delete();
        
        // TODO: Figure out where to redirect a player if successful
        return redirect('/');
    } //deletePlayer
    
    // Get and return admin panel to manage users
    public function admin() {
        
        Log::debug("admin()");
        
        $players = Player::all();

        return view('players.admin', ['players' => $players]);
        
    } //leaderboard
    
}
