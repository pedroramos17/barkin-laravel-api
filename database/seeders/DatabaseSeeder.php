<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@test.com',
        ]);


        \App\Models\Driver::factory(5)
            ->hasVehicles()
            ->create();

        \App\Models\Gateway::factory(10)
            ->has(\App\Models\Driver::factory())
            ->create();
    }
}
