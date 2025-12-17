@extends('layouts.app')

@php
    $routePrefix = auth()->user()->role === 'admin' ? 'admin' : 'petugas';
@endphp

@section('content')
<div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6 border border-blue-200">

    <h2 class="text-xl font-bold mb-6 text-blue-400">
        ✏️ Edit Produk
    </h2>

    <form method="POST"
          action="{{ route($routePrefix . '.produk.update', $produk->id) }}"
          class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-blue-400">
                Nama Produk
            </label>
            <input type="text"
                   name="nama_produk"
                   value="{{ $produk->nama_produk }}"
                   class="w-full mt-1 border border-blue-200 rounded px-3 py-2
                          focus:ring-2 focus:ring-blue-300 focus:outline-none"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-blue-400">
                Harga
            </label>
            <input type="number"
                   name="harga"
                   value="{{ $produk->harga }}"
                   class="w-full mt-1 border border-blue-200 rounded px-3 py-2
                          focus:ring-2 focus:ring-blue-300 focus:outline-none"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-blue-400">
                Stok
            </label>
            <input type="number"
                   name="stok"
                   value="{{ $produk->stok }}"
                   class="w-full mt-1 border border-blue-200 rounded px-3 py-2
                          focus:ring-2 focus:ring-blue-300 focus:outline-none"
                   required>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route($routePrefix . '.produk.index') }}"
               class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white transition">
                Batal
            </a>

            <button
                class="px-4 py-2 rounded bg-green-500 hover:bg-green-600 text-white transition">
                Update
            </button>
        </div>
    </form>

</div>
@endsection
