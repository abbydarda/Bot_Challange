<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'userId',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
