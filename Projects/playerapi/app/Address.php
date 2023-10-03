<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address',
        'city',
        'country',
        'postal_code',
    ];

    public function players()
    {
        return $this->hasOne(Player::class);
    }
}
