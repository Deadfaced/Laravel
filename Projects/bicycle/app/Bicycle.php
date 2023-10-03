<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
