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
        
        //$players = Player::all()->orderBy('wins', 'desc');
        $players = Player::all();
        

        return view('players.leaderboard', ['players' => $players]);
        
    } //leaderboard
    
    // Return view to create a new player
    public function newPlayerPage() {
        
        Log::debug("newPlayerPage()");
        
        return view('players.new');
    } //newPlayerPage
    
    // Add a new player
    public function newPlayer(Request $request) {
        
        Log::debug("newPlayer(Request $request)");
        
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $player = new Player();
        $player->name = $request->name;
        $player->save();
        
        
    } //newPlayer
    
    // Return view to edit player
    public function editPlayerPage($player_id) {
        $player = Player::find($player_id);
        return view('players.edit', ['player' => $player]);
    } //newPlayerPage
    
    
    // Edit a player
    public function editPlayer(Request $request, $player_id) {
        
        Log::debug("editPlayer(Request $request, $player_id)");
        
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        
        $player = Player::find($player_id);
        $player->name = $request->name;
        $player->update();
        
    } //editPlayer
    
    
    // Get a player
    public function getPlayer($player_id) {
        $player = Player::find($player_id);
        return view('players.get', ['player' => $player]);
    } // getPlayer
    
    // Delete a player
    public function deletePlayer($player_id) {
        
        Log::debug("deletePlayer($player_id)");
        
        $player = Player::find($player_id);
        
        // TODO: What should I do with a player's games once they've been deleted
        // Could store the user's name as well as ID in the game model
        $player->delete();
        
        // TODO: Figure out where to redirect a player if successful
        // return redirect('/');
        return view('players.get', ['player' => $player]);
    } //deletePlayer
    
    // Get and return admin panel to manage users
    public function admin() {
        
        Log::debug("admin()");
        
        $players = Player::all();
        

        return view('players.admin', ['players' => $players]);
        
    } //leaderboard
    
}
