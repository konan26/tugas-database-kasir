@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Tambah Member</h2>

    <form method="POST" action="{{ route('admin.members.store') }}">
        @csrf
        @include('members.form')
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
