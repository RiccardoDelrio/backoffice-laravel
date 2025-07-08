<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres=[
            [
                'name' => 'Action',
                'description' => 'Fast-paced games focused on physical challenges.',
            ],
            [
                'name' => 'Adventure',
                'description' => 'Games that emphasize exploration and puzzle-solving.',
            ],
            [
                'name' => 'Role-Playing',
                'description' => 'Games where players assume the roles of characters in a fictional setting.',
            ],
            [
                'name' => 'Simulation',
                'description' => 'Games that simulate real-world activities.',
            ],
            [
                'name' => 'Strategy',
                'description' => 'Games that require careful planning and resource management.',
            ],
            [
                'name' => 'Sports',
                'description' => 'Games that simulate the practice of sports.',
            ],
            [
                'name' => 'Puzzle',
                'description' => 'Games that challenge problem-solving skills.',
            ],
            [
                'name' => 'Horror',
                'description' => 'Games designed to scare and unsettle players.',
            ],
            [
                'name' => 'Platformer',
                'description' => 'Games that involve jumping between platforms.',
            ],
            [
                'name' => 'Fighting',
                'description' => 'Games that focus on close combat between characters.',
            ],
            [
                'name' => 'Racing',
                'description' => 'Games that involve racing vehicles against others.',
            ],
            [
                'name' => 'MMORPG',
                'description' => 'Massively multiplayer online role-playing games.',
            ],
            [
                'name' => 'Battle Royale',
                'description' => 'Games where players fight to be the last one standing.',
            ],
            [
                'name' => 'Stealth',
                'description' => 'Games that emphasize stealth and avoiding detection.',
            ],
            [
                'name' => 'Open World',
                'description' => 'Games set in expansive worlds that players can explore freely.',
            ]
        ];
        foreach ($genres as $genre) {
            $newGenre = new Genre() ;
            $newGenre->name = $genre['name'];
            $newGenre->description = $genre['description'];
            $newGenre->save();
        }
    }
}
