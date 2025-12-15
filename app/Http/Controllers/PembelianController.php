<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('nama_produk')->get();
        return view('pembelian.index', compact('produk'));
    }

    public function store(Request $request)
    {
        $items = json_decode($request->items, true);

        DB::transaction(function () use ($request, $items) {

            // ✅ CEK STOK DULU
            foreach ($items as $item) {
                $produk = Produk::lockForUpdate()->find($item['produk_id']);

                if ($produk->stok < $item['jumlah']) {
                    throw new \Exception('Stok produk ' . $produk->nama_produk . ' tidak mencukupi');
                }
            }

            // ✅ SIMPAN PENJUALAN
            $penjualan = Penjualan::create([
                'tanggal_penjualan' => now(),
                'total_harga' => $request->total
            ]);

            foreach ($items as $item) {

                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'produk_id' => $item['produk_id'],
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $item['subtotal']
                ]);

                // ✅ KURANGI STOK
                Produk::where('id', $item['produk_id'])
                    ->decrement('stok', $item['jumlah']);
            }
        });

        return redirect()
            ->route(
                auth()->user()->role === 'admin'
                    ? 'admin.pembelian.index'
                    : 'petugas.pembelian.index'
            )
            ->with('success', '✅ Transaksi berhasil & stok diperbarui');
            }

}
