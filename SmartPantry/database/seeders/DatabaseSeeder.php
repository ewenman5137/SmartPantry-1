<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'Name' => fake()->name,
            'email' => fake()->email,
        ]);
        $prod1 = Produit::create([
            'Name' => 'test',
            'Quantity' => 1,
            'Unit' => 'g',
        ]);
        $prod2 = Produit::create([
            'Name' => 'test2',
            'Quantity' => 2,
            'Unit' => 'g',
        ]);

        $user->produits()->attach($prod1->id, ['Date_Ajout' => now(), 'Date_Expiration' => now()->addDays(7)]);
        $user->produits()->attach($prod2->id, ['Date_Ajout' => now(), 'Date_Expiration' => now()->addDays(7)]);
    }
}
