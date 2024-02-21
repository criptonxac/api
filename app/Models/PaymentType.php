<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;
use Spatie\Translatable\HasTranslations;

class PaymentType extends Model
{
    use HasFactory ,HasTranslations, SoftDeletes;

    protected $fillable = [

        'name',

    ];

    protected $table = 'payment_types';

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public array $translatable=["name"];
}
