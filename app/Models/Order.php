<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable =[

        'user_id',
        'comment',
        'delivery_method_id',
        'payment_type_id',
        'sum',
        'status_id',
        'products',
        'address',


    ];


    use HasFactory;

    protected $casts = [

        'products'  => 'array',
        'address'   => 'array',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public  function paymentType(): BelongsTo
    {
       return $this->belongsTo(PaymentType::class);
    }

    public  function deliveryMethod(): BelongsTo
    {
        return $this->belongsTo(DeliveryMethod::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

}
