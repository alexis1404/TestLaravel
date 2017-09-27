<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

    public function getAllItems()
    {
        return $this->hasMany(Item::class);
    }

    public function getAllTikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
