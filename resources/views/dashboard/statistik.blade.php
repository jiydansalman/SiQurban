@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-semibold mb-4">Statistik Penjualan</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white p-4 shadow rounded">
        <h3 class="text-lg font-bold">Total Penjualan</h3>
        <p class="text-2xl text-green-500">Rp 120.000.000</p>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <h3 class="text-lg font-bold">Produk Terjual</h3>
        <p class="text-2xl text-blue-500">3500+</p>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <h3 class="text-lg font-bold">Pendapatan Bulanan</h3>
        <p class="text-2xl text-yellow-500">Rp 15.000.000</p>
    </div>
</div>
@endsection
