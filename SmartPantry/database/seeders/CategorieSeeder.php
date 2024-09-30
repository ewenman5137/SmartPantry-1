<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::truncate();

        $csvFile = fopen(base_path("/data/Categories.txt"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Categorie::create([
                    'Name' => $data[0],
                    'thumbnail' => $data[1],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
