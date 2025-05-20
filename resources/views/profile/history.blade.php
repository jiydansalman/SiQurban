@extends('layouts.profile')

@section('content')
<main class="flex-1 p-10">
  <h1 class="text-2xl font-bold mb-6">Riwayat Aktivitas</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border rounded-lg shadow">
      <thead>
        <tr class="bg-[#8B5D33] text-white">
          <th class="py-3 px-6 text-left">Tanggal</th>
          <th class="py-3 px-6 text-left">Aktivitas</th>
          <th class="py-3 px-6 text-left">Status</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        <tr class="border-t">
          <td class="py-3 px-6">12 April 2025</td>
          <td class="py-3 px-6">Edit profil pengguna</td>
          <td class="py-3 px-6 text-green-600 font-medium">Sukses</td>
        </tr>
        <tr class="border-t">
          <td class="py-3 px-6">10 April 2025</td>
          <td class="py-3 px-6">Ganti password</td>
          <td class="py-3 px-6 text-green-600 font-medium">Sukses</td>
        </tr>
        <tr class="border-t">
          <td class="py-3 px-6">5 April 2025</td>
          <td class="py-3 px-6">Gagal login (3x)</td>
          <td class="py-3 px-6 text-red-500 font-medium">Gagal</td>
        </tr>
        <tr class="border-t">
          <td class="py-3 px-6">1 April 2025</td>
          <td class="py-3 px-6">Menambahkan metode pembayaran</td>
          <td class="py-3 px-6 text-green-600 font-medium">Sukses</td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
@endsection