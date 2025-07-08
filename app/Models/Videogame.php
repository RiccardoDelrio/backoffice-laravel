<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Videogame extends Model
{
   public function genres(){
    return $this->belongsToMany(Genre::class);
   } 
}
