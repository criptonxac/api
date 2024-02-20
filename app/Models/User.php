<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements LaratrustUser
{
    use HasApiTokens,  HasRolesAndPermissions,HasFactory, Notifiable;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',

    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function addresses():HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function favorites() :BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }


    public function hasFavorite($favorite_id): bool
    {


        return  $this->favorites()->where('product_id',$favorite_id)->exists();

    }

}
