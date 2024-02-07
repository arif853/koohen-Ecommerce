<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your JSON file
       $jsonPath = public_path('admin/assets/json/bd-divisions.json');

       $jsonData = json_decode(file_get_contents($jsonPath), true);

       // Assuming your table is named 'districts'
       foreach ($jsonData['divisions'] as $division) {
           // Insert data into the database
           DB::table('divisions')->insert($division);
       }
    }
}
