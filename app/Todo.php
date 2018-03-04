<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'completed',
        'title',
        'userId',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }
}
