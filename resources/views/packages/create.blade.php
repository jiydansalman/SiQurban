@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-semibold mb-4">Tambah Produk</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow space-y-4">
    @csrf
    <input type="text" name="name" placeholder="Nama Produk" class="w-full border p-2 rounded">
    <input type="text" name="type" placeholder="Kategori (sapi/kambing/domba)" class="w-full border p-2 rounded">
    <input type="number" name="price" placeholder="Harga" class="w-full border p-2 rounded">
    <input type="file" name="image" class="w-full">
    <textarea name="description" placeholder="Deskripsi" class="w-full border p-2 rounded"></textarea>
    <button class="bg-green-500 text-white px-4 py-2 rounded">Tambah Produk</button>
</form>
@endsection