<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'product_nr',
    ];

    public function stocks()
    {
        return $this->belongsToMany('App\Stock');
    }
}
