<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create([
            'name' => 'Park-1',
            'parent_id' => 1,
            'image' => '',
            'description' => 'This is nice park',

        ]);
        Place::create([
            'name' => 'Park-2',
            'parent_id' => 1,
            'image' => '',
            'description' => 'This is nice park',

        ]);
    }
}
