<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'product_name',
        'total_price',
        'created_at',
        'updated_at'
    ];
}
