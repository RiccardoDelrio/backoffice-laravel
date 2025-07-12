<?php

namespace Database\Seeders;

use App\Models\Videogame;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoGameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videogames = [
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'description' => 'An open-world RPG set in a fantasy universe filled with meaningful choices, gripping quests, and unforgettable characters.',
                'developer' => 'CD Projekt Red',
                'release_year' => 2015,
                'image' => null,
                'is_beta' => false,
                'price' => 39.99,
                'genres' => ['Role-Playing', 'Open World', 'Adventure'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S', 'Nintendo Switch']
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'A futuristic open-world RPG set in Night City, where you play as a cyberpunk mercenary involved in a fight for survival.',
                'developer' => 'CD Projekt Red',
                'release_year' => 2020,
                'image' => null,
                'is_beta' => false,
                'price' => 59.99,
                'genres' => ['Role-Playing', 'Open World', 'Action'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S']
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'An epic tale of life in Americas unforgiving heartland, featuring a vast and atmospheric world.',
                'developer' => 'Rockstar Games',
                'release_year' => 2018,
                'image' => null,
                'is_beta' => false,
                'price' => 49.99,
                'genres' => ['Action', 'Adventure', 'Open World'],
                'platforms' => ['PC', 'PlayStation 4', 'Xbox One']
            ],
            [
                'title' => 'Grand Theft Auto V',
                'description' => 'A satirical crime adventure set in the sprawling city of Los Santos.',
                'developer' => 'Rockstar Games',
                'release_year' => 2013,
                'image' => null,
                'is_beta' => false,
                'price' => 29.99,
                'genres' => ['Action', 'Open World', 'Adventure'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S']
            ],
            [
                'title' => 'Elden Ring',
                'description' => 'A dark fantasy action RPG that combines the signature gameplay of FromSoftware with an open world.',
                'developer' => 'FromSoftware',
                'release_year' => 2022,
                'image' => null,
                'is_beta' => false,
                'price' => 59.99,
                'genres' => ['Role-Playing', 'Action', 'Open World'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S']
            ],
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'description' => 'An open-world adventure that breaks conventions and challenges expectations.',
                'developer' => 'Nintendo',
                'release_year' => 2017,
                'image' => null,
                'is_beta' => false,
                'price' => 59.99,
                'genres' => ['Adventure', 'Open World', 'Action'],
                'platforms' => ['Nintendo Switch']
            ],
            [
                'title' => 'Minecraft',
                'description' => 'A sandbox game that allows players to build and explore infinite worlds.',
                'developer' => 'Mojang Studios',
                'release_year' => 2011,
                'image' => null,
                'is_beta' => false,
                'price' => 26.95,
                'genres' => ['Simulation', 'Adventure', 'Open World'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S', 'Nintendo Switch', 'iOS', 'Android']
            ],
            [
                'title' => 'Call of Duty: Modern Warfare II',
                'description' => 'The ultimate weapon is team. Master the ultimate multiplayer playground across land, air, and sea.',
                'developer' => 'Infinity Ward',
                'release_year' => 2022,
                'image' => null,
                'is_beta' => false,
                'price' => 69.99,
                'genres' => ['Action', 'Battle Royale'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S']
            ],
            [
                'title' => 'FIFA 23',
                'description' => 'The worlds game on the worlds stage. Experience unrivaled authenticity with over 19,000 players.',
                'developer' => 'EA Sports',
                'release_year' => 2022,
                'image' => null,
                'is_beta' => false,
                'price' => 69.99,
                'genres' => ['Sports'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S', 'Nintendo Switch']
            ],
            [
                'title' => 'Fortnite',
                'description' => 'The complete Fortnite experience combining creative building with competitive combat.',
                'developer' => 'Epic Games',
                'release_year' => 2017,
                'image' => null,
                'is_beta' => false,
                'price' => 0,
                'genres' => ['Battle Royale', 'Action'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S', 'Nintendo Switch', 'iOS', 'Android']
            ],
            [
                'title' => 'Stardew Valley',
                'description' => 'A farming simulation game with RPG elements that lets you live the life youve always dreamed of.',
                'developer' => 'ConcernedApe',
                'release_year' => 2016,
                'image' => null,
                'is_beta' => false,
                'price' => 13.99,
                'genres' => ['Simulation', 'Role-Playing'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S', 'Nintendo Switch', 'iOS', 'Android']
            ],
            [
                'title' => 'Super Mario Odyssey',
                'description' => 'Join Mario on a massive, globe-trotting 3D adventure and use his incredible new abilities.',
                'developer' => 'Nintendo',
                'release_year' => 2017,
                'image' => null,
                'is_beta' => false,
                'price' => 59.99,
                'genres' => ['Platformer', 'Adventure'],
                'platforms' => ['Nintendo Switch']
            ],
            [
                'title' => 'Horizon Zero Dawn',
                'description' => 'Experience Aloys entire legendary quest to unravel the mysteries of a world ruled by machines.',
                'developer' => 'Guerrilla Games',
                'release_year' => 2017,
                'image' => null,
                'is_beta' => false,
                'price' => 49.99,
                'genres' => ['Action', 'Role-Playing', 'Open World'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5']
            ],
            [
                'title' => 'Among Us',
                'description' => 'Play with 4-15 players online or via local WiFi as you attempt to prep your spaceship for departure.',
                'developer' => 'InnerSloth',
                'release_year' => 2018,
                'image' => null,
                'is_beta' => false,
                'price' => 4.99,
                'genres' => ['Strategy', 'Puzzle'],
                'platforms' => ['PC', 'Nintendo Switch', 'iOS', 'Android']
            ],
            [
                'title' => 'Resident Evil 4',
                'description' => 'Survival is just the beginning. The genre-defining masterpiece has been completely rebuilt from the ground up.',
                'developer' => 'Capcom',
                'release_year' => 2023,
                'image' => null,
                'is_beta' => false,
                'price' => 59.99,
                'genres' => ['Horror', 'Action', 'Adventure'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S']
            ],
            [
                'title' => 'Street Fighter 6',
                'description' => 'Powered by Capcoms proprietary RE ENGINE, Street Fighter 6 spans three distinct game modes.',
                'developer' => 'Capcom',
                'release_year' => 2023,
                'image' => null,
                'is_beta' => false,
                'price' => 59.99,
                'genres' => ['Fighting'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox Series X/S']
            ],
            [
                'title' => 'Gran Turismo 7',
                'description' => 'Whether youre a competitive or casual racer, collector, tuner, or photographer – find your line.',
                'developer' => 'Polyphony Digital',
                'release_year' => 2022,
                'image' => null,
                'is_beta' => false,
                'price' => 69.99,
                'genres' => ['Racing', 'Sports', 'Simulation'],
                'platforms' => ['PlayStation 4', 'PlayStation 5']
            ],
            [
                'title' => 'World of Warcraft',
                'description' => 'Join millions of players and go on an adventure in the world of Azeroth.',
                'developer' => 'Blizzard Entertainment',
                'release_year' => 2004,
                'image' => null,
                'is_beta' => false,
                'price' => 14.99,
                'genres' => ['MMORPG', 'Role-Playing'],
                'platforms' => ['PC']
            ],
            [
                'title' => 'Hitman 3',
                'description' => 'Death Awaits. Agent 47 returns in HITMAN 3, the dramatic conclusion to the World of Assassination trilogy.',
                'developer' => 'IO Interactive',
                'release_year' => 2021,
                'image' => null,
                'is_beta' => false,
                'price' => 59.99,
                'genres' => ['Stealth', 'Action'],
                'platforms' => ['PC', 'PlayStation 4', 'PlayStation 5', 'Xbox One', 'Xbox Series X/S', 'Nintendo Switch']
            ],
            [
                'title' => 'Portal 2',
                'description' => 'The perpetual testing initiative has been expanded to allow you to design co-operative puzzles.',
                'developer' => 'Valve',
                'release_year' => 2011,
                'image' => null,
                'is_beta' => false,
                'price' => 9.99,
                'genres' => ['Puzzle', 'Adventure'],
                'platforms' => ['PC', 'PlayStation 4', 'Xbox One', 'Xbox Series X/S']
            ]
        ];

        foreach ($videogames as $videogame) {
            $newVideogame = new Videogame();
            $newVideogame->title = $videogame['title'];
            $newVideogame->description = $videogame['description'];
            $newVideogame->developer = $videogame['developer'];
            $newVideogame->release_year = $videogame['release_year'];
            $newVideogame->image = $videogame['image'];
            $newVideogame->is_beta = $videogame['is_beta'];
            $newVideogame->price = $videogame['price'];
            $newVideogame->save();

            // Associo i generi specifici per questo gioco
            $genreNames = $videogame['genres'];
            $genres = Genre::whereIn('name', $genreNames)->get();
            $newVideogame->genres()->attach($genres->pluck('id'));

            // Associo le piattaforme specifiche per questo gioco
            $platformNames = $videogame['platforms'];
            $platforms = Platform::whereIn('name', $platformNames)->get();
            $newVideogame->platforms()->attach($platforms->pluck('id'));
        }
    }
}
