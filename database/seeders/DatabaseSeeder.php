<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attribut;
use App\Models\Category;
use App\Models\Value;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            CategorySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            AttributSeeder::class,
            ValueSeeder::class,
            ProductSeeder::class,

        ]);
    }
}
