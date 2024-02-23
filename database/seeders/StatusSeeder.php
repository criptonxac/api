<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([

            'name'=> [
                'uz'=>'yangi',
                'ru'=>'noviy',
                'en'=>'new'
            ],
            'code'  =>'new',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'Tasdiqlandi',
                'ru'=>'Tasdiqlandi',
                'en'=>'confirmed'
            ],
            'code'  =>'confirmed',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'ishlab chiqarilmoqda',
                'ru'=>'progrese',
                'en'=>'processing'
            ],
            'code'  =>'processing',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'mahsulot yulda',
                'ru'=>'v daroge',
                'en'=>'shipping'
            ],
            'code'  =>'shipping',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'Yetkazib berildi',
                'ru'=>'dostavleno',
                'en'=>'delivered'
            ],
            'code'  =>'delivered',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'To\'lovni kutilmoqda',
                'ru'=>'ojidaniya oplate',
                'en'=>'waiting_payment'
            ],
            'code'  =>'waiting_payment',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'To\'landi',
                'ru'=>'oplacheno',
                'en'=>'payment_accepted'
            ],
            'code'  =>'payment_accepted',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'bekor qilindi',
                'ru'=>'otmenino',
                'en'=>'canceled'
            ],
            'code'  =>'canceled',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'Tugatildi',
                'ru'=>'tugatildi',
                'en'=>'complete'
            ],
            'code'  =>'complete',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'Qaytarib berildi',
                'ru'=>'Qaytarib berildi',
                'en'=>'refunded'
            ],
            'code'  =>'refunded',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'Yopildi',
                'ru'=>'Zakrita',
                'en'=>'closed'
            ],
            'code'  =>'closed',
            'for'   =>'order',
        ]);
        Status::create([

            'name'=> [
                'uz'=>'To\'landi xato',
                'ru'=>'oshibka oplate',
                'en'=>'payment_error'
            ],
            'code'  =>'payment_error',
            'for'   =>'order',
        ]);
    }
}
