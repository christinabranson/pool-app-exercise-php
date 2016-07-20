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
    public function games() {
        Log::debug("games()");
        Log::debug("for player id: " .  $this->player_id);
        $games = Game::where('player_1_id', $this->player_id)
                    ->orWhere('player_2_id', $this->player_id)
                    ->get();
        return $games;
    }
    
    // Get player's win count
    public function wins() {
        Log::debug("wins()");
        Log::debug("for player id: " .  $this->player_id);
        $wins = Game::where('winner_id', $this->player_id)->count();
        return $wins;
    }
    
    // Get player's loss count
    public function losses() {
        Log::debug("losses()");
        Log::debug("for player id: " .  $this->player_id);
        
        $wins = $this->wins();
        
        // remove games that haven't picked a winner yet
        $filtered = $this->games()->filter(function ($game) {
            return $game->winner_id != 0;
        });
        
        $filtered->all();
        $gameCount = sizeof($filtered);
        
        // return difference between game played and wins
        return $gameCount - $wins;
    }
    
    // Add rank attribute
    // Used only in the leaderboard function as a way
    // to temporarily add a rank for display purposes
    protected $rank = 0;

    public function getRank()
    {
        return $this->rank;
    }

    public function setRank($value)
    {
        $this->rank = $value;
    }
}
