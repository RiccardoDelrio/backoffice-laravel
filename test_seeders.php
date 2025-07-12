<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Videogame;

echo "=== PRIMI 5 VIDEOGIOCHI CON GENERI E PIATTAFORME ===\n\n";

$games = Videogame::with(['genres', 'platforms'])->limit(5)->get();

foreach ($games as $game) {
    echo "🎮 {$game->title} ({$game->release_year})\n";
    echo "   Developer: {$game->developer}\n";
    echo "   Price: {$game->price}\n";
    echo "   Genres: " . $game->genres->pluck('name')->join(', ') . "\n";
    echo "   Platforms: " . $game->platforms->pluck('name')->join(', ') . "\n";
    echo "   Description: " . substr($game->description, 0, 80) . "...\n\n";
}

echo "Totale giochi: " . Videogame::count() . "\n";
echo "Totale generi: " . \App\Models\Genre::count() . "\n";
echo "Totale piattaforme: " . \App\Models\Platform::count() . "\n";
