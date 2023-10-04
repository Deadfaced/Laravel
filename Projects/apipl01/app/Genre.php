<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['description'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
