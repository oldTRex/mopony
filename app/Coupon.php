<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    protected $hidden = ['code'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
