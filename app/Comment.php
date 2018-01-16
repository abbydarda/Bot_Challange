<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'postId',
        'userId',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }

    public function post(){
        return $this->belongsTo('App\Post', 'postId');
    }
}
