<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Log;

class Stock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'city'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'stock_product')->withPivot('balance')->whereNull('stock_product.deleted_at');;
    }

    public function logs()
    {
        return Log::where('stock_id', $this->id)->get();
    }
}
