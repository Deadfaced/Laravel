<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'retired',
        'address_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
