<div class="space-y-4">
    <div>
        <label class="block">Nama</label>
        <input type="text" name="nama"
            value="{{ old('nama', $member->nama ?? '') }}"
            class="w-full border px-3 py-2 rounded" required>
    </div>

    <div>
        <label class="block">No HP</label>
        <input type="text" name="no_hp"
            value="{{ old('no_hp', $member->no_hp ?? '') }}"
            class="w-full border px-3 py-2 rounded">
    </div>

    <div>
        <label class="block">Diskon (%)</label>
        <input type="number" name="diskon"
            value="{{ old('diskon', $member->diskon ?? 0) }}"
            class="w-full border px-3 py-2 rounded"
            min="0" max="100" required>
    </div>
</div>
