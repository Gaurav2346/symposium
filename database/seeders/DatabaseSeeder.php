<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Conference, Talk, User};

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->has(Talk::factory()->count(5))
            ->create([
                'name' => 'Gaurav bhoir',
                'email' => 'ghb+default@example.com',
                'password' => '12345678',
        ]);

        Conference::factory()->count(10)->create();
    }
}
