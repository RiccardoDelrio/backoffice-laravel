<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            [
                'name' => 'PC',
                'description' => 'Personal Computer',
            ],
            [
                'name' => 'PlayStation 5',
                'description' => 'Sony PlayStation 5 Console',
            ],
            [
                'name' => 'Xbox Series X',
                'description' => 'Microsoft Xbox Series X Console',
            ],
            [
                'name' => 'Nintendo Switch',
                'description' => 'Nintendo Switch Hybrid Console',
            ],
        ];

        foreach ($platforms as $platform) {
            $newPlatform = new Platform();
            $newPlatform->name = $platform['name'];
            $newPlatform->description = $platform['description'];
            $newPlatform->save();
        }
    }
}
