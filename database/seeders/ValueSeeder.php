<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([

            "attribute_id"=> 1,
            "name"        => [

                "uz"      => "Qora",
                "ru"      => "Chorniy",
                "en"      => "Black",
            ]
        ]);

        Value::create([

            "attribute_id"=> 2,
            "name"        => [

                "uz"      => "Qizil",
                "ru"      => "Krasniy",
                "en"      => "Red",
            ]
        ]);
    }
}
