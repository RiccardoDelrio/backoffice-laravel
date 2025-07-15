<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
   public function index(){
        $videogames = Videogame::with('genres', 'platforms')->get();
    return response()->json([
        "success" => true,
        "data" => $videogames
    ]);
   }

   public function show($id)
    {
        $videogame = Videogame::with('genres', 'platforms')->find($id);
        
     

        return response()->json([
            "success" => true,
            "data" => $videogame
        ]);
    }
}
