<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Videogame;

class Platform extends Model
{
    public function videogames(){
        return $this->belongsToMany(Videogame::class);
    }
}
