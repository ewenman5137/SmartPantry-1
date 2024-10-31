<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'FirstName' => 'Test',
            'LastName' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'pantry' => [
                'items' => [
                    [
                        'name' => 'Milk',
                        'quantity' => 1,
                        'unit' => 'gallon',
                        'expiration' => '2021-12-31',
                    ],
                    [
                        'name' => 'Eggs',
                        'quantity' => 12,
                        'unit' => 'count',
                        'expiration' => '2021-12-31',
                    ],
                    [
                        'name' => 'Bread',
                        'quantity' => 1,
                        'unit' => 'loaf',
                        'expiration' => '2021-12-31',
                    ],
                ],
            ],
        ]);
    }
}
