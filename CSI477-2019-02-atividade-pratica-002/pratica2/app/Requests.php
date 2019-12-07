<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    // Request -> Subject (N:1)
    public function subject(){
        return $this->belongsTo('App\Subjects');
    }

    // Request -> User (N:1)
    public function user(){
        return $this->belongsTo('App\User');
    }
}