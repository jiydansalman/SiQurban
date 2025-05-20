@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Dashboard Admin</h2>
    <form action="/login">
        @csrf
        <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
    </form>
</div>

<p class="text-gray-600">Selamat datang di halaman dashboard. Silakan pilih menu dari sidebar untuk mulai mengelola data.</p>
@endsection
