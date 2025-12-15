@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6">

    <h2 class="text-xl font-bold mb-6 text-gray-700">
        ✏️ Edit Produk
    </h2>

    <form method="POST" action="{{ route('produk.update', $produk->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-600">
                Nama Produk
            </label>
            <input type="text" name="nama_produk"
                   value="{{ $produk->nama_produk }}"
                   class="w-full mt-1 border rounded px-3 py-2"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">
                Harga
            </label>
            <input type="number" name="harga"
                   value="{{ $produk->harga }}"
                   class="w-full mt-1 border rounded px-3 py-2"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">
                Stok
            </label>
            <input type="number" name="stok"
                   value="{{ $produk->stok }}"
                   class="w-full mt-1 border rounded px-3 py-2"
                   required>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('produk.index') }}"
               class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                Batal
            </a>

            <button class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white">
                Update
            </button>
        </div>
    </form>

</div>
@endsection
