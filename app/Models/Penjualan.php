<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    protected $fillable = [
        'tanggal_penjualan',
        'total_harga'
    ];

    public function detail()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
