<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statues extends Model
{

    protected $fillable = [
        'content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
