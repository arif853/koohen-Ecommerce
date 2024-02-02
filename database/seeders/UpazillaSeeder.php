<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpazillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your JSON file
       $jsonPath = public_path('admin/assets/json/bd-upazilas.json');

       $jsonData = json_decode(file_get_contents($jsonPath), true);

       // Assuming your table is named 'districts'
       foreach ($jsonData['upazilas'] as $upazilla) {
           // Insert data into the database
           DB::table('upazillas')->insert($upazilla);
       }

    }
}
