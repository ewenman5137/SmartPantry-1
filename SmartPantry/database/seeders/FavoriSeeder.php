<?php

namespace Database\Seeders;

use App\Models\Favori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;



class FavoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Favori::truncate();

        $csvFile = fopen(base_path("/data/Favoris.txt"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Favori::create([
                    'user_id' => $data[0],
                    'recipe_id' => $data[1],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
