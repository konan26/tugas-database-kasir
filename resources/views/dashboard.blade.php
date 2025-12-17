<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-400 leading-tight">
            Dashboard Owner
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-500 text-green-700 px-6 py-4 rounded-lg mb-8">
                    {{ session('success') }}
                </div>
            @endif

            {{-- CARD OMSET --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <!-- Hari Ini -->
                <div class="bg-white shadow rounded-lg p-6 border border-blue-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-400">Omset Hari Ini</p>
                            <p class="text-3xl font-bold text-green-600">
                                Rp {{ number_format($omsetHarian) }}
                            </p>
                            <p class="text-xs text-blue-400 mt-1">
                                {{ $transaksiHariIni }} transaksi
                            </p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-full text-blue-500">
                            💰
                        </div>
                    </div>
                </div>

                <!-- Minggu Ini -->
                <div class="bg-white shadow rounded-lg p-6 border border-green-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-400">Omset Minggu Ini</p>
                            <p class="text-3xl font-bold text-green-600">
                                Rp {{ number_format($omsetMingguan) }}
                            </p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-full text-green-600">
                            📈
                        </div>
                    </div>
                </div>

                <!-- Bulan Ini -->
                <div class="bg-white shadow rounded-lg p-6 border border-red-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-400">Omset Bulan Ini</p>
                            <p class="text-3xl font-bold text-green-600">
                                Rp {{ number_format($omsetBulanan) }}
                            </p>
                        </div>
                        <div class="bg-red-100 p-4 rounded-full text-red-500">
                            🧾
                        </div>
                    </div>
                </div>

            </div>

            {{-- PRODUK TERLARIS --}}
            <div class="bg-white shadow rounded-lg p-6 border border-blue-200">
                <h3 class="text-lg font-semibold mb-4 text-blue-400">
                    Produk Terlaris (Bulan Ini)
                </h3>

                @if($produkTerlaris && count($produkTerlaris) > 0)
                    <div class="space-y-4">
                        @foreach($produkTerlaris as $item)
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                                <div class="flex items-center space-x-4">

                                    @if($item->product->image)
                                        <img src="{{ asset('storage/'.$item->product->image) }}"
                                             class="w-12 h-12 object-cover rounded">
                                    @else
                                        <div class="bg-blue-100 w-12 h-12 rounded"></div>
                                    @endif

                                    <div>
                                        <p class="font-medium text-blue-400">
                                            {{ $item->product->name }}
                                        </p>
                                        <p class="text-sm text-green-600">
                                            Kode: {{ $item->product->code }}
                                        </p>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <p class="text-2xl font-bold text-green-600">
                                        {{ $item->total_terjual }}x
                                    </p>
                                    <p class="text-sm text-red-500">
                                        terjual
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-red-500 text-center py-8">
                        Belum ada penjualan bulan ini
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
