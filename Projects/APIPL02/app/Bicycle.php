<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    protected $fillable = ['brand', 'model', 'color', 'price', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
