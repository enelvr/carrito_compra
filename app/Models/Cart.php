<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id', 'product_id', 'cantidad'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function producto()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
