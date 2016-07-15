<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Set primary key
    protected $primaryKey = 'game_id';
    
    // Set mass assignable properties
    protected $fillable = ['player_1_id, player_2_id, winner_id'];
    
    
}
