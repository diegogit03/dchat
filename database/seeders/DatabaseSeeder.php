<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use App\Models\Chat;
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

        User::factory()
            ->state([
                'email' => 'diego@email.com'
            ])
            ->has(
                Chat::factory()
                    ->count(10)
                    ->has(User::factory()->count(1))
            )
            ->create();
    }
}
