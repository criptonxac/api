<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory,HasTranslations;


    protected $table='categories';

    protected $fillable=[

        "name",
        "icon"

        ];

    public $translatable=["name"];






    public function product():HasMany
    {

        return $this->hasMany(Product::class);
    }
}
