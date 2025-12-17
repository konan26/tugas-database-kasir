<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'nama',
        'no_hp',
        'diskon'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
