<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class DeliveryMethod extends Model
{
    use HasFactory, HasTranslations,SoftDeletes;

    protected $table='delivery_methods';

    protected $fillable = [

        'name',
        'estimated_time',
        'sum',

    ];

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    public array $translatable=["name"];
}
