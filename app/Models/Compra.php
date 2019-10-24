<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $fillable = [
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
