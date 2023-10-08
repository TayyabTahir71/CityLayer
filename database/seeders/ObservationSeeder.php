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
            'name' => 'Protection',
        ]);
        Observation::create([
            'name' => 'Comfort',
        ]);

        Observation::create([
            'name' => 'Enjoyment',
        ]);
        Observation::create([
            'name' => 'Noise',
        ]);

        Observation::create([
            'name' => 'Meeting friends',
        ]);
        Observation::create([
            'name' => 'Fun to spend time',
        ]);
        Observation::create([
            'name' => 'Places to rest',
        ]);
        Observation::create([
            'name' => 'Walk, roll, bike comfort',
        ]);
        Observation::create([
            'name' => 'Play potential',
        ]);
        Observation::create([
            'name' => 'Multifunctionality',
        ]);
        Observation::create([
            'name' => 'Visibility & orientation',
        ]);
        Observation::create([
            'name' => 'Rain & wind protection',
        ]);
        Observation::create([
            'name' => 'Design & beauty',
        ]);
        Observation::create([
            'name' => 'Interesting sights',
        ]);
        Observation::create([
            'name' => 'Calmness',
        ]);
        Observation::create([
            'name' => 'Livelyness',
        ]);
        Observation::create([
            'name' => 'Plants & trees',
        ]);
        Observation::create([
            'name' => 'Cleanliness',
        ]);
        Observation::create([
            'name' => 'Shade for hot water',
        ]);
        Observation::create([
            'name' => 'taling and listening',
        ]);
        Observation::create([
            'name' => 'Memorababilty',
        ]);
        Observation::create([
            'name' => 'Pollutants',
        ]);
        Observation::create([
            'name' => 'Night listening',
        ]);
        Observation::create([
            'name' => 'Other hazards',
        ]);
        Observation::create([
            'name' => 'Architectural Improvement',
        ]);
        Observation::create([
            'name' => 'Condition',
        ]);
        Observation::create([
            'name' => 'Protection from traffic',
            'parent_id' => 1
        ]);
        Observation::create([
            'name' => 'Protection from harm',
            'parent_id' => 1
        ]);
        Observation::create([
            'name' => 'Protection from dangerous objects',
            'parent_id' => 1
        ]);
    }
}
