<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Prendi i giochi più recenti e popolari
        $featuredGames = Videogame::with('genres', 'platforms')
            ->whereNotNull('image')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $newReleases = Videogame::with('genres', 'platforms')
            ->orderBy('release_year', 'desc')
            ->take(4)
            ->get();

        $popularGames = Videogame::with('genres', 'platforms')
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        $genres = Genre::all();
        $platforms = Platform::all();

        return view('welcome', compact('featuredGames', 'newReleases', 'popularGames', 'genres', 'platforms'));
    }
}
