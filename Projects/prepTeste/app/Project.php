<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function products(){
        return $this->hasMany(\App\Product::class);
    }
}
