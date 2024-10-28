<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;



class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Produit::truncate();

        $csvFile = fopen(base_path("/data/Produits.txt"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Produit::create([
                    'Name' => $data[0],
                    'quantity' => $data[1],
                    'addedDate' => $data[2],
                    'expirationDate' => $data[3],
                    'Unit' => $data[4],
                    'thumbnail' => $data[5],
                    'category_id' => $data[6],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
