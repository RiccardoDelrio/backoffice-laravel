<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Platform;

class Videogame extends Model
{
   public function genres(){
    return $this->belongsToMany(Genre::class);
   } 

   public function platforms(){
    return $this->belongsToMany(Platform::class);
   }
}
