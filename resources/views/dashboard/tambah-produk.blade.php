@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-semibold mb-4">Tambah Produk</h2>
<form class="bg-white p-4 rounded shadow space-y-4">
    <input type="text" placeholder="Nama Produk" class="w-full border p-2 rounded">
    <input type="number" placeholder="Harga" class="w-full border p-2 rounded">
    <input type="file" class="w-full">
    <textarea placeholder="Deskripsi" class="w-full border p-2 rounded"></textarea>
    <button class="bg-green-500 text-white px-4 py-2 rounded">Tambah Produk</button>
</form>
@endsection
