@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">

    <h2 class="text-2xl font-bold mb-6 text-gray-700">
        🧾 Transaksi Pembelian / Kasir
    </h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.pembelian.store') }}">
        @csrf

        <div class="grid grid-cols-3 gap-6">

            <!-- DAFTAR PRODUK -->
            <div class="col-span-2 bg-white shadow rounded-lg p-6">
                <h3 class="font-semibold mb-4 text-lg border-b pb-2">
                    Daftar Produk
                </h3>

                <table class="w-full text-sm border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border text-left">Produk</th>
                            <th class="p-2 border text-center">Harga</th>
                            <th class="p-2 border text-center">Jumlah</th>
                            <th class="p-2 border text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($produk as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border">{{ $p->nama_produk }}</td>
                            <td class="p-2 border text-center">
                                Rp {{ number_format($p->harga) }}
                            </td>
                            <td class="p-2 border text-center">
                                <input type="number"
                                       min="1"
                                       value="1"
                                       class="jumlah w-20 border rounded px-2 py-1 text-center">
                            </td>
                            <td class="p-2 border text-center">
                                <button type="button"
                                    onclick="tambahItem(
                                        {{ $p->id }},
                                        '{{ $p->nama_produk }}',
                                        {{ $p->harga }},
                                        {{ $p->stok }},
                                        this
                                    )"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs">
                                    + Tambah
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- KERANJANG -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="font-semibold mb-4 text-lg border-b pb-2">
                    Keranjang
                </h3>

                <table class="w-full text-sm mb-4">
                    <thead>
                        <tr class="border-b">
                            <th>Barang</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="cart"></tbody>
                </table>

                <div class="border-t pt-4">
                    <div class="flex justify-between font-bold text-lg">
                        <span>Total</span>
                        <span id="grandTotal">Rp 0</span>
                    </div>

                    <input type="hidden" name="total" id="inputTotal">
                    <input type="hidden" name="items" id="inputItems">

                    <button type="submit"
                            onclick="prepareSubmit()"
                            class="w-full mt-4 bg-green-600 hover:bg-green-700 text-white py-2 rounded font-semibold">
                        ✅ Bayar
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>

@stack('scripts')
<script>
let cart = [];
let total = 0;

function tambahItem(id, nama, harga, stok, btn) {
    const row = btn.closest('tr');
    const jumlahInput = row.querySelector('.jumlah');
    const jumlah = parseInt(jumlahInput.value);

    if (jumlah <= 0) return;

    const existing = cart.find(item => item.produk_id === id);
    const jumlahDiKeranjang = existing ? existing.jumlah : 0;

    // ✅ Cek stok
    if (jumlah + jumlahDiKeranjang > stok) {
        alert('❌ Stok tidak mencukupi');
        return;
    }

    if (existing) {
        existing.jumlah += jumlah;
        existing.subtotal = existing.jumlah * harga;
    } else {
        cart.push({
            produk_id: id,
            nama: nama,
            harga: harga,
            jumlah: jumlah,
            stok: stok,
            subtotal: jumlah * harga
        });
    }

    jumlahInput.value = 1;
    renderCart();
}

function updateJumlah(id, change) {
    const item = cart.find(i => i.produk_id === id);
    if (!item) return;

    const newJumlah = item.jumlah + change;

    if (newJumlah > item.stok) {
        alert('❌ Stok tidak mencukupi');
        return;
    }

    if (newJumlah <= 0) {
        cart = cart.filter(i => i.produk_id !== id);
    } else {
        item.jumlah = newJumlah;
        item.subtotal = item.jumlah * item.harga;
    }

    renderCart();
}

function renderCart() {
    const cartEl = document.getElementById('cart');
    cartEl.innerHTML = '';
    total = 0;

    cart.forEach(item => {
        total += item.subtotal;
        cartEl.innerHTML += `
            <tr class="border-b">
                <td>${item.nama}</td>
                <td class="text-center">
                    <button type="button"
                        onclick="updateJumlah(${item.produk_id}, -1)"
                        class="px-2 bg-red-500 text-white rounded">−</button>

                    <span class="mx-2 font-semibold">${item.jumlah}</span>

                    <button type="button"
                        onclick="updateJumlah(${item.produk_id}, 1)"
                        class="px-2 bg-green-500 text-white rounded">+</button>
                </td>
                <td class="text-right">
                    Rp ${item.subtotal.toLocaleString()}
                </td>
            </tr>
        `;
    });

    document.getElementById('grandTotal').innerText =
        'Rp ' + total.toLocaleString();
}

function prepareSubmit() {
    if (cart.length === 0) {
        alert('❌ Keranjang kosong');
        event.preventDefault();
        return;
    }

    document.getElementById('inputTotal').value = total;
    document.getElementById('inputItems').value = JSON.stringify(cart);
}
</script>
@endsection
