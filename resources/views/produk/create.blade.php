@extends('layouts.app')

@php
    $routePrefix = auth()->user()->role === 'admin' ? 'admin' : 'petugas';
@endphp

@section('content')
<div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6">

    <h2 class="text-xl font-bold mb-6 text-gray-700">
        ➕ Tambah Produk
    </h2>

    <form method="POST"
          action="{{ route($routePrefix . '.produk.store') }}"
          class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-600">Nama Produk</label>
            <input type="text" name="nama_produk"
                   class="w-full mt-1 border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Harga</label>
            <input type="number" name="harga"
                   class="w-full mt-1 border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Stok</label>
            <input type="number" name="stok"
                   class="w-full mt-1 border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route($routePrefix . '.produk.index') }}"
               class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                Batal
            </a>

            <button class="px-4 py-2 rounded bg-green-600 hover:bg-green-700 text-white">
                Simpan
            </button>
        </div>
    </form>

</div>
@endsection
