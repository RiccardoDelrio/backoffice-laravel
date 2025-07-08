<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoGameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videogames=[
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'description' => 'An open-world RPG set in a fantasy universe.',
                'developer' => 'CD Projekt Red',
                'release_year' => 2015,
                'image' => 'https://example.com/witcher3.jpg',
                'is_beta' => false,
                'price' => '$39.99',
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'A futuristic open-world RPG set in Night City.',
                'developer' => 'CD Projekt Red',
                'release_year' => 2020,
                'image' => 'https://example.com/cyberpunk2077.jpg',
                'is_beta' => false,
                'price' => '$59.99',
            ],
            [
                'title' => 'Stardew Valley',
                'description' => 'A farming simulation game with RPG elements.',
                'developer' => 'ConcernedApe',
                'release_year' => 2016,
                'image' => 'https://example.com/stardewvalley.jpg',
                'is_beta' => false,
                'price' => '$14.99',
            ]
        ];

        foreach ($videogames as $videogame) {
            $newVideogame= new Videogame();
            $newVideogame->title = $videogame['title'];
            $newVideogame->description = $videogame['description'];
            $newVideogame->developer = $videogame['developer'];
            $newVideogame->release_year = $videogame['release_year'];
            $newVideogame->image = $videogame['image'];
            $newVideogame->is_beta = $videogame['is_beta'];
            $newVideogame->price = $videogame['price'];
            $newVideogame->save();
        }
    }
}
