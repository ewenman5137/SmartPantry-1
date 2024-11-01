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
            'FirstName' => 'Test',
            'LastName' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $prod1 = Produit::create([
            'Name' => 'Test Product',
            'quantity' => 1,
            'addedDate' => now(),
            'expirationDate' => now()->addDays(7),
            'Unit' => 'g',
            'thumbnail' => 'https://via.placeholder.com/150',
            'category_id' => 1,
        ]);
        $prod2 = Produit::create([
            'Name' => 'Test Product 2',
            'quantity' => 2,
            'addedDate' => now(),
            'expirationDate' => now()->addDays(14),
            'Unit' => 'g',
            'thumbnail' => 'https://via.placeholder.com/150',
            'category_id' => 2,
        ]);

        $user->produits()->attach([$prod1->id, $prod2->id]);
    }
}
