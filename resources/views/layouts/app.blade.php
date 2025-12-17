<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Kasir</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50">

    @php
        $user = auth()->user();
        $routePrefix = $user->role === 'admin' ? 'admin' : 'petugas';
    @endphp

    <!-- NAVBAR -->
    <nav class="bg-blue-400 text-white px-6 py-4 flex justify-between items-center shadow">

        <!-- MENU -->
        <div class="flex space-x-6 font-semibold">
            <a href="{{ route($routePrefix . '.produk.index') }}"
               class="hover:text-green-300 transition">
                Pendataan Barang
            </a>

            <a href="{{ route($routePrefix . '.pembelian.index') }}"
               class="hover:text-green-300 transition">
                Pembelian
            </a>

            @if($user->role === 'admin')
                <a href="{{ route('admin.petugas.create') }}"
                   class="hover:text-green-300 transition">
                    Tambah Petugas
                </a>
            @endif
        </div>

        <!-- USER -->
        <div class="flex items-center space-x-4">
            <span class="text-sm text-green-200">
                {{ $user->name }} ({{ ucfirst($user->role) }})
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 px-3 py-1 rounded hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>
