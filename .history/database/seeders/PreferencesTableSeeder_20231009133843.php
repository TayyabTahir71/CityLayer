<?php

namespace Database\Seeders;

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
            // Add more references as needed.
        ];

        foreach ($references as $reference) {
            DB::table('references')->insert([
                'name' => $reference,
            ]);
        }
    }
}
