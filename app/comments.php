<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    public function post(){
        return $this->belongsTo('App/post');
    }
}
