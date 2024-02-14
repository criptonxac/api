<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class UserAddress extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [


        'user_id',
        'latitude',
        'longitude',
        'region',
        'district',
        'street',
        'home',

    ];

    protected $table = 'user_addresses';

    public array $translatable=[
            "name",
            "latitude",
            "longitude",
            "region",
            "district",
            "street",
            "home",

    ];



}
