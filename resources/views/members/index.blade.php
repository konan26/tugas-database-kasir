@extends('layouts.app')

@section('content')

@php
    $prefix = auth()->user()->role === 'admin' ? 'admin' : 'petugas';
@endphp

<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-semibold">Data Member</h2>
        <a href="{{ route($prefix . '.members.create') }}">+ Tambah Member</a>
    </div>

    <table class="w-full border">
        <thead class="bg-blue-100">
            <tr>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">No HP</th>
                <th class="p-2 border">Diskon (%)</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td class="p-2 border">{{ $member->nama }}</td>
                <td class="p-2 border">{{ $member->no_hp ?? '-' }}</td>
                <td class="p-2 border">{{ $member->diskon }}</td>
                <td class="p-2 border space-x-2">
                    <a href="{{ route($prefix . '.members.edit', $member) }}">Edit</a>
                @if(auth()->user()->role === 'admin')
                <form action="{{ route($prefix . '.members.destroy', $member) }}"
                    method="POST"
                    class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600"
                        onclick="return confirm('Hapus member?')">
                        Hapus
                    </button>
                </form>
                @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
