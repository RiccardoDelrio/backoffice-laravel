<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Platform;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoGameController 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::with('genres', 'platforms')->get();
        return view('Pages.gamesDashboard', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        $platforms = Platform::all();
        return view('Pages.createGame', compact('genres', 'platforms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newGame = new Videogame();
        $newGame->title = $data['title'];
        $newGame->description = $data['description'];
        $newGame->developer = $data['developer'];
        $newGame->price = $data['price'] ?? null;
        $newGame->is_beta = $data['is_beta'] ?? false; // Corretto nome campo
        $newGame->release_year = $data['release_year'];
        if(array_key_exists("image", $data)) {
            $url_image = Storage::putFile('uploads', $data['image']);
            $newGame->image = $url_image;
        } else {
            $newGame->image = null; // Se non viene fornita un'immagine, impostala a null
        }
        $newGame->save();
        
        if (isset($data['genres'])) {
            $newGame->genres()->attach($data['genres']);
        }

        if (isset($data['platforms'])) {
            $newGame->platforms()->attach($data['platforms']);
        }

        return redirect()->route('videogames.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        $videogame->load('genres', 'platforms'); // carico i generi e le piattaforme associati al videogame
        $allGenres = Genre::all(); 
        $allPlatforms = Platform::all();
        return view('Pages.gameDetails', compact('videogame', 'allGenres', 'allPlatforms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $genres = Genre::all();
        $platforms = Platform::all();
        return view('Pages.editGame', compact('videogame', 'genres', 'platforms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();
        $videogame->title = $data['title'];
        $videogame->description = $data['description'];
        $videogame->developer = $data['developer'];
        $videogame->release_year = $data['release_year'];
        $videogame->price = $data['price'] ?? null;
        $videogame->is_beta = $data['is_beta'] ?? false;
        if(array_key_exists("image", $data)) {
            // Elimina l'immagine precedente solo se esiste
            if ($videogame->image) {
                Storage::delete($videogame->image);
            }
            $url_image = Storage::putFile('uploads', $data['image']);
            $videogame->image = $url_image;
        } 
     
        $videogame->update();

        if (isset($data['genres'])) {
            $videogame->genres()->sync($data['genres']);
        }

        if (isset($data['platforms'])) {
            $videogame->platforms()->sync($data['platforms']);
        }
        
        return redirect()->route('videogames.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->genres()->detach();// elimino le associazioni con i generi
        $videogame->platforms()->detach();// elimino le associazioni con le piattaforme
        if ($videogame->image) {
            Storage::delete($videogame->image); // elimino l'immagine dal filesystem
        }
        $videogame->delete();
        
        return redirect()->route('videogames.index');
    }
}
