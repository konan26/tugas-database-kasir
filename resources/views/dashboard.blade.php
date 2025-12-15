<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Owner
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-8">
                    {{ session('success') }}
                </div>
            @endif

            {{-- CARD OMSET --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <!-- Hari Ini -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Omset Hari Ini</p>
                            <p class="text-3xl font-bold text-indigo-600">
                                Rp {{ number_format($omsetHarian) }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">{{ $transaksiHariIni }} transaksi</p>
                        </div>
                        <div class="bg-indigo-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Minggu Ini -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Omset Minggu Ini</p>
                            <p class="text-3xl font-bold text-green-600">
                                Rp {{ number_format($omsetMingguan) }}
                            </p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Bulan Ini -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Omset Bulan Ini</p>
                            <p class="text-3xl font-bold text-purple-600">
                                Rp {{ number_format($omsetBulanan) }}
                            </p>
                        </div>
                        <div class="bg-purple-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            {{-- PRODUK TERLARIS --}}
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Produk Terlaris (Bulan Ini)</h3>
                
                @if($produkTerlaris && count($produkTerlaris) > 0)
                    <div class="space-y-4">
                        @foreach($produkTerlaris as $item)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-4">

                                    @if($item->product->image)
                                        <img src="{{ asset('storage/'.$item->product->image) }}" class="w-12 h-12 object-cover rounded">
                                    @else
                                        <div class="bg-gray-200 w-12 h-12 rounded"></div>
                                    @endif

                                    <div>
                                        <p class="font-medium">{{ $item->product->name }}</p>
                                        <p class="text-sm text-gray-500">Kode: {{ $item->product->code }}</p>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <p class="text-2xl font-bold text-indigo-600">{{ $item->total_terjual }}x</p>
                                    <p class="text-sm text-gray-500">terjual</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">Belum ada penjualan bulan ini</p>
                @endif
            </div>
            
        </div>
    </div>
</x-app-layout>
