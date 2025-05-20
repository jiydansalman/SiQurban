@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-semibold mb-4">Tambah Admin</h2>
<form class="bg-white p-4 rounded shadow space-y-4 mb-6">
    <input type="text" placeholder="Nama Admin" class="w-full border p-2 rounded">
    <input type="email" placeholder="Email" class="w-full border p-2 rounded">
    <input type="password" placeholder="Password" class="w-full border p-2 rounded">
    <button class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
</form>

<h3 class="text-lg font-semibold mb-2">Daftar Admin</h3>
<table class="min-w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="text-left p-2">Nama</th>
            <th class="text-left p-2">Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="p-2">Admin Utama</td>
            <td class="p-2">admin@example.com</td>
        </tr>
        <tr>
            <td class="p-2">Siti Admin</td>
            <td class="p-2">siti@shop.com</td>
        </tr>
    </tbody>
</table>
@endsection
