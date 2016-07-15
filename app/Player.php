<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // Set primary key
    protected $primaryKey = 'player_id';
    
    // Set mass assignable properties
    protected $fillable = ['name, wins, losses'];
}
