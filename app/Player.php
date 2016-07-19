<?php

namespace App;

use Log;
use DB;
use App\Game;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // Set primary key
    protected $primaryKey = 'player_id';
    
    // Set mass assignable properties
    protected $fillable = ['name, wins, losses'];
    
    // Get player's name
    // Return with upper character first
    public function getNameAttribute($value) {
        return ucfirst($value);
    }
    
    // Get player's games
    // TODO: Make this work with Eloquent model instead of DB
    public function games()
    {
        Log::debug("games()");
        Log::debug("for player id: " .  $this->player_id);
        $games = DB::table('games')
                    ->where('player_1_id', $this->player_id)
                    ->orWhere('player_2_id', $this->player_id)
                    ->get();
        $games = Game::where('player_1_id', $this->player_id)
                    ->orWhere('player_2_id', $this->player_id)
                    ->get();
        return $games;
    }
    
    // TODO: Function to add to winner's wins
    public function addWin() {
        $this->wins = $this->wins + 1;
        $this->save();
    }
    
    // TODO: Function to add to loser's losse
    public function addLoss() {
        $this->losses = $this->losses + 1;
        $this->save(); 
    }
    
    
    // TODO: Accessor to modify times to something human readable
}
