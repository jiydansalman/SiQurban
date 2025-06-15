@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Packages</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data" class="bg-white p-4 rounded shadow space-y-4">
    @csrf
    <input type="text" name="name" placeholder="Nama Produk" class="w-full border p-2 rounded" required>
    <input type="text" name="type" placeholder="Jenis Hewan (sapi/kambing/domba)" class="w-full border p-2 rounded" required>
    <input type="number" name="price" placeholder="Harga" class="w-full border p-2 rounded" required>
    <input type="file" name="image" class="w-full" required>
    <textarea name="description" placeholder="Deskripsi" class="w-full border p-2 rounded"></textarea>
    <button class="bg-green-500 text-white px-4 py-2 rounded">Add Packages</button>
</form>
@endsection
