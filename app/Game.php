<?php

namespace App;

use Log;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Set primary key
    protected $primaryKey = 'game_id';
    
    // Set mass assignable properties
    protected $fillable = ['player_1_id, player_2_id, winner_id'];
    
    // Get player info for both players
    public function players() {
        Log::debug("players()");
        Log::debug("for game id: " .  $this->game_id);
        $players = Player::findOrFail([$this->player_1_id,$this->player_2_id]);
        return $players;
    }
    
    // Get player info for player 1
    public function player1() {
        Log::debug("player1()");
        Log::debug("for game id: " .  $this->game_id);
        $player = Player::findOrFail($this->player_1_id);
        return $player;
    }
    
    // Get player info for player 2
    public function player2() {
        Log::debug("player2()");
        Log::debug("for game id: " .  $this->game_id);
        $player = Player::findOrFail($this->player_2_id);
        return $player;
    }
    
    // Get player info for winner
    // TODO: Winner might not be set yet so come with a strategy for that
    public function winner() {
        Log::debug("winner()");
        Log::debug("for game id: " .  $this->game_id);
        $player = Player::find($this->winner_id);
        return $player;
    }
}
