<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produit::truncate();

        $csvFile = fopen(base_path("/data/Produits.txt"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Produit::create([
                    'Name' => $data[0],
                    'quantity' => $data[1],
                    'price' => $data[2],
                    'addedDate' => $data[3],
                    'expirationDate' => $data[4],
                    'UnitWeight' => $data[5],
                    'thumbnail' => $data[6],
                    'category-id' => $data[7],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
