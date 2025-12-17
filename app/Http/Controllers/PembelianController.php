<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class PembelianController extends Controller
{

public function index()
{
    $produk = Produk::orderBy('nama_produk')->get();
    $members = Member::orderBy('nama')->get();

    return view('pembelian.index', compact('produk', 'members'));
}

   public function store(Request $request)
{
    $items = json_decode($request->items, true);
    $member = Member::find($request->member_id);

    DB::transaction(function () use ($request, $items, $member) {

        foreach ($items as $item) {
            $produk = Produk::lockForUpdate()->find($item['produk_id']);
            if ($produk->stok < $item['jumlah']) {
                throw new \Exception('Stok tidak mencukupi');
            }
        }

        $total = $request->total;
        $diskon = $member ? ($total * $member->diskon / 100) : 0;
        $totalBayar = $total - $diskon;

        $penjualan = Penjualan::create([
            'member_id' => $member?->id,
            'tanggal_penjualan' => now(),
            'total_harga' => $total,
            'diskon' => $diskon,
            'total_bayar' => $totalBayar
        ]);

        foreach ($items as $item) {
            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $item['produk_id'],
                'jumlah' => $item['jumlah'],
                'subtotal' => $item['subtotal']
            ]);

            Produk::where('id', $item['produk_id'])
                ->decrement('stok', $item['jumlah']);
        }
    });

    return back()->with('success', '✅ Transaksi berhasil');
}


}
