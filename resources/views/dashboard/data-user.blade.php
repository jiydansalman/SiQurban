@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-semibold mb-4">Data User</h2>
<table class="min-w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="text-left p-2">Nama</th>
            <th class="text-left p-2">Email</th>
            <th class="text-left p-2">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="p-2">Rina Wijaya</td>
            <td class="p-2">rina@example.com</td>
            <td class="p-2">Aktif</td>
        </tr>
        <tr>
            <td class="p-2">Budi Santoso</td>
            <td class="p-2">budi@example.com</td>
            <td class="p-2">Nonaktif</td>
        </tr>
    </tbody>
</table>
@endsection
