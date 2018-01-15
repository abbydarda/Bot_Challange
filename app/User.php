<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'company',
        'email',
        'lat',
        'lng',
        'name',
        'password',
        'phone',
        'street',
        'suite',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = ['company' => 'json'];

    public function posts(){
        return $this->hasmany('App\Post');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function albums(){
        return $this->hasMany('App\Album');
    }

    public function todos(){
        return $this->hasMany('App\Todo');
    }
}
