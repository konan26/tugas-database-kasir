<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white py-4 px-6 flex justify-between items-center shadow">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-sm font-semibold">
                Logout
            </button>
        </form>
    </nav>

    <!-- Container -->
    <div class="p-6">

        <!-- Welcome -->
        <div class="bg-white shadow rounded-xl p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">
                Selamat datang, {{ auth()->user()->name }} 👋
            </h2>
            <p class="text-gray-500 mt-2">Ini adalah halaman dashboard Admin Anda.</p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-xl shadow border hover:shadow-lg transition">
                <h3 class="text-lg font-semibold text-gray-700">Jumlah User</h3>
                <p class="text-3xl font-bold mt-3 text-blue-600">12</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-xl shadow border hover:shadow-lg transition">
                <h3 class="text-lg font-semibold text-gray-700">Transaksi Hari Ini</h3>
                <p class="text-3xl font-bold mt-3 text-green-600">35</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-xl shadow border hover:shadow-lg transition">
                <h3 class="text-lg font-semibold text-gray-700">Total Pendapatan</h3>
                <p class="text-3xl font-bold mt-3 text-yellow-600">Rp 2.500.000</p>
            </div>

        </div>

        <!-- Menu Section -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">

            <a href="#" class="bg-white p-6 rounded-xl shadow border hover:bg-blue-50 transition">
                <h3 class="text-lg font-semibold text-gray-700">Kelola Pengguna</h3>
                <p class="text-gray-500 mt-2">Tambah, edit, atau hapus pengguna sistem.</p>
            </a>

            <a href="#" class="bg-white p-6 rounded-xl shadow border hover:bg-blue-50 transition">
                <h3 class="text-lg font-semibold text-gray-700">Laporan Transaksi</h3>
                <p class="text-gray-500 mt-2">Lihat laporan dan data transaksi.</p>
            </a>

        </div>

    </div>

</body>

</html>
