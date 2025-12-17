<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    protected $fillable = [
        'member_id',
        'tanggal_penjualan',
        'total_harga',
        'diskon',
        'total_bayar'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function detail()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
