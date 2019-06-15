<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockProduct extends Model
{
    use SoftDeletes;

    protected $table = 'stock_product';

    protected $fillable = [
        'stock_id',
        'product_id',
        'balance',
    ];
}
