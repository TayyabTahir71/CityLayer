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
        ]);
        Place::create([
            'name' => 'Public square',
        ]);
        Place::create([
            'name' => 'Meeting spot',
        ]);
        Place::create([
            'name' => 'Public art installation',
        ]);
        Place::create([
            'name' => 'Marketplace',
        ]);
        Place::create([
            'name' => 'Pop-up event',
        ]);
        Place::create([
            'name' => 'Street',
        ]);
        Place::create([
            'name' => 'Community garden',
        ]);
        Place::create([
            'name' => 'Path',
        ]);
        Place::create([
            'name' => 'Bike lane',
        ]);
        Place::create([
            'name' => 'Construction site',
        ]);
        Place::create([
            'name' => 'Recreation space',
        ]);
        Place::create([
            'name' => 'Playground',
        ]);
        Place::create([
            'name' => 'Empty lot',
        ]);
        Place::create([
            'name' => 'Parking lot',
        ]);
        Place::create([
            'name' => 'Public transport station',
        ]);
        Place::create([
            'name' => 'Landmark',
        ]);
        Place::create([
            'name' => 'Restaurant',
        ]);
        Place::create([
            'name' => 'Café',
        ]);
        Place::create([
            'name' => 'Commercial space',
        ]);
        Place::create([
            'name' => 'Educational space',
        ]);
        Place::create([
            'name' => 'Religious space',
        ]);
        Place::create([
            'name' => 'Museum',
        ]);
        Place::create([
            'name' => 'City Parks',
            'parent_id' => 1,
        ]);
        Place::create([
            'name' => 'Dog Parks',
            'parent_id' => 1,
        ]);
        Place::create([
            'name' => 'Fitness Parks',
            'parent_id' => 1,
        ]);
    }
}
