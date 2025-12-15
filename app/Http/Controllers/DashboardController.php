<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        // OMSET HARIAN
        $omsetHarian = Transaction::whereDate('created_at', today())
            ->sum('total_price');

        $transaksiHariIni = Transaction::whereDate('created_at', today())
            ->count();

        // OMSET MINGGUAN
        $omsetMingguan = Transaction::whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->sum('total_price');

        // OMSET BULANAN
        $omsetBulanan = Transaction::whereMonth('created_at', now()->month)
            ->sum('total_price');

        // PRODUK TERLARIS
        $produkTerlaris = Transaction::select('product_name')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('product_name')
            ->orderByDesc('total')
            ->first();

        return view('dashboard', [
            'omsetHarian' => $omsetHarian,
            'transaksiHariIni' => $transaksiHariIni,
            'omsetMingguan' => $omsetMingguan,
            'omsetBulanan' => $omsetBulanan,
            'produkTerlaris' => $produkTerlaris,
        ]);
    }
}
