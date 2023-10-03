<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function product(){
        return $this->hasMany(\App\Product::class);
    }
}
