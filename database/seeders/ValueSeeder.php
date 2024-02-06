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

            'attribute_id'=> 1,
            'name'        => [

                "uz"      => 'Qora',
                "ru"      => 'Chorniy',
                "en"      => 'Black',
            ]
        ]);
        Value::create([

            'attribute_id'=> 1,
            'name'        => [

                "uz"      => 'yaxshil',
                "ru"      => 'asss',
                "en"      => 'green',
            ]
        ]);


        Value::create([

            'attribute_id'=> 2,
            'name'        => [

                'uz'      => 'mebel',
                'ru'      => 'divan',
                'en'      => 'aaaa',
            ]
        ]);
        Value::create([

            'attribute_id'=> 2,
            'name'        => [

                'uz'      => 'mebel',
                'ru'      => 'aaass',
                'en'      => 'sssaa',
            ]
        ]);

        Value::create([

            'attribute_id'=> 3,
            'name'        => [

                'uz'      => 'kreslo',
                'ru'      => 'stul',
                'en'      => 'ggg',
            ]
        ]);
        Value::create([

            'attribute_id'=> 3,
            'name'        => [

                'uz'      => 'atapleniya',
                'ru'      => 'hhhh',
                'en'      => 'cccc',
            ]
        ]);
    }

}
