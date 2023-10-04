<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'country_id',
        'first_name',
        'last_name',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bicycles()
    {
        return $this->hasMany(Bicycle::class);
    }
}
