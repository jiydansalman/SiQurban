@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Paket Qurban</h2>
        <a href="{{ route('admin.packages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Tambah Package
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Jenis</th>
                <th class="p-2 border">Harga</th>
                <th class="p-2 border">Deskripsi</th>
                <th class="p-2 border">Gambar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($packages as $package)
                <tr>
                    <td class="p-2 border">{{ $package->name }}</td>
                    <td class="p-2 border">{{ $package->type }}</td>
                    <td class="p-2 border">Rp{{ number_format($package->price, 0, ',', '.') }}</td>
                    <td class="p-2 border">{{ $package->description }}</td>
                    <td class="p-2 border">
                        <img src="{{ asset('storage/' . $package->image_path) }}" class="h-20" alt="Image">
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-2 border text-gray-500">Belum ada data paket</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
