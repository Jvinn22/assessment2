<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil UserSeeder untuk mengisi data Admin dan Petugas
        $this->call([
            UserSeeder::class,
        ]);
    }
}