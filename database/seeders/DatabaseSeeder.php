<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use UsersTableSeeder;
use SalesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(\Database\Seeders\UsersTableSeeder::class);
        $this->call(\Database\Seeders\SalesTableSeeder::class);
    }
}
