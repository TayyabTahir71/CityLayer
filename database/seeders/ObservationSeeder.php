<?php

namespace Database\Seeders;

use App\Models\Observation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Observation::create([
            'name' => 'Happy',
            'image' => '',
            'description' => '',

        ]);
        Observation::create([
            'name' => 'Sad',
            'image' => '',
            'description' => '',

        ]);
    }
}
