<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'quantity',
        'stock_id',
        'product_id',
        'author',
        'note',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product')->withTrashed();
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock');
    }
}
