<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $genres = Genre::all();
        $platforms = Platform::all();
        return view('welcome', compact('genres', 'platforms'));
    }
}
