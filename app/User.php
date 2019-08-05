<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\UserFavorite;
class User extends Authenticatable
{
    //protected $table="user";

    use HasApiTokens,Notifiable;

    protected $table="user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','document_number',
        'document_type','gender','nationality','phone_fix','phone_movil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favouriteProducts()
    {
        return $this->hasMany(UserFavorite::class, 'user_id', 'id');
        //return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
