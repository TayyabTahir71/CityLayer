<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create([
            'name' => 'Park',
            'image' => '',
            'description' => 'This is nice park',

        ]);
        Place::create([
            'name' => 'Playing Ground',
            'image' => '',
            'description' => 'This is nice place',
        ]);
    }
}
