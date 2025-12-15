@extends('layouts.app')

@php
    $role = auth()->user()->role;
    $routePrefix = $role === 'admin' ? 'admin' : 'petugas';
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700">
            📦 Pendataan Barang
        </h2>

        <a href="{{ route($routePrefix . '.produk.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-3 text-left">Nama Produk</th>
                    <th class="p-3 text-left">Harga</th>
                    <th class="p-3 text-left">Stok</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($produk as $p)
                <tr class="hover:bg-gray-50">
                    <td class="p-3">{{ $p->nama_produk }}</td>
                    <td class="p-3">Rp {{ number_format($p->harga) }}</td>
                    <td class="p-3">{{ $p->stok }}</td>
                    <td class="p-3 text-center flex justify-center gap-2">
                        <a href="{{ route($routePrefix . '.produk.edit', $p->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route($routePrefix . '.produk.destroy', $p->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus produk ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
