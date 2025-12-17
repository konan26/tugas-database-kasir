@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Edit Member</h2>

    <form method="POST" action="{{ route('admin.members.update', $member) }}">
        @csrf
        @method('PUT')
        @include('members.form')
        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
