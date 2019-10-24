<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraDetalle extends Model
{
    protected $table = 'compras_products';

    protected $fillable = [
        'compras_id', 'product_id'
    ];

    public function compra()
    {
        return $this->belongsTo('App\Models\Compra', 'compras_id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
