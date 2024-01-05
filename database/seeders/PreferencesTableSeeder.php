<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $references = [
            "city cycling",
            "street photography",
            "cityscape exploring",
            "nature exploring",
            "urban gardening",
            "park picnics",
            "outdoor sports",
            "long walks through the city",
            "nightlife",
            "historic landmarks",
            "hidden germs",
            "architecture",
            "observing nature",
            "observing people",
            "lively and vibrant places",
            "walking difficulties",
            "walking to work / school",
            "car travelling",
            "public transport",
            "outdoor activities"
        ];

        foreach ($references as $reference) {
            DB::table('preferences')->insert([
                'name' => $reference,
            ]);
        }
    }
}
