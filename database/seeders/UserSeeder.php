<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $admin= User::create([


            'first_name'=> 'Admin',
            'last_name' => 'Admin',
            'email'     => 'admin@gmail.com',
            'phone'     => '+998991234567',
            'password'  => Hash::make('cripton'),
        ]);

        $superuser= User::create([


            'first_name'=> 'superuser',
            'last_name' => 'superuser',
            'email'     => 'superuser@gmail.com',
            'phone'     => '+99899632444144',
            'password'  => Hash::make('cripton2023'),
        ]);


       User::factory()->count(10)->hasAttached(Role::find(3))->create();
    }
}
