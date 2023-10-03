<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Project extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function products(){
        return $this->hasMany(Product::class);
    }
}
