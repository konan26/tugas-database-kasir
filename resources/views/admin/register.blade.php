@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-500">
            Manajemen Petugas
        </h2>

        <button onclick="openModal()"
            class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
            + Tambah Petugas
        </button>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE PETUGAS --}}
    <div class="bg-white shadow rounded-lg overflow-hidden border border-blue-200">
        <table class="w-full text-sm">
            <thead class="bg-blue-100 text-blue-700">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-center">Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse($petugas as $p)
                    <tr class="border-t border-blue-200 hover:bg-green-50 transition">
                        <td class="p-3">{{ $p->name }}</td>
                        <td class="p-3">{{ $p->email }}</td>
                        <td class="p-3 text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 rounded text-xs">
                                Petugas
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-4 text-center text-red-500">
                            Belum ada petugas
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL --}}
<div id="modal"
     class="fixed inset-0 bg-blue-900/50 hidden flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6 border border-blue-200">
        <h3 class="text-xl font-bold mb-4 text-blue-500">
            Tambah Petugas
        </h3>

        <form method="POST" action="{{ route('admin.petugas.store') }}" class="space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Nama Petugas"
                   class="w-full border border-blue-200 rounded px-3 py-2
                          focus:ring-2 focus:ring-blue-300 focus:outline-none"
                   required>

            <input type="email" name="email" placeholder="Email"
                   class="w-full border border-blue-200 rounded px-3 py-2
                          focus:ring-2 focus:ring-blue-300 focus:outline-none"
                   required>

            <input type="password" name="password" placeholder="Password"
                   class="w-full border border-blue-200 rounded px-3 py-2
                          focus:ring-2 focus:ring-blue-300 focus:outline-none"
                   required>

            <input type="password" name="password_confirmation"
                   placeholder="Konfirmasi Password"
                   class="w-full border border-blue-200 rounded px-3 py-2
                          focus:ring-2 focus:ring-blue-300 focus:outline-none"
                   required>

            <div class="flex justify-end gap-2 pt-2">
                <button type="button"
                        onclick="closeModal()"
                        class="px-4 py-2 bg-red-400 text-white rounded hover:bg-red-500 transition">
                    Batal
                </button>

                <button
                    class="px-4 py-2 bg-green-400 text-white rounded hover:bg-green-500 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPT --}}
<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}
</script>
@endsection
