@extends('layouts.profile')

@section('content')
<main class="flex-1 p-10">
  <h1 class="text-2xl font-bold mb-6">Help Center</h1>
  <div class="space-y-4">
    <details class="border p-4 rounded-lg">
      <summary class="font-semibold cursor-pointer">Bagaimana cara mengubah password saya?</summary>
      <p class="mt-2 text-gray-700">Pergi ke halaman Security, lalu isi password lama dan baru untuk memperbarui.</p>
    </details>
    <details class="border p-4 rounded-lg">
      <summary class="font-semibold cursor-pointer">Bagaimana jika saya lupa password?</summary>
      <p class="mt-2 text-gray-700">Gunakan fitur “Lupa Password” di halaman login dan ikuti instruksi di email.</p>
    </details>
    <details class="border p-4 rounded-lg">
      <summary class="font-semibold cursor-pointer">Siapa yang bisa saya hubungi untuk bantuan lebih lanjut?</summary>
      <p class="mt-2 text-gray-700">Hubungi tim support kami melalui email: support@siqurban.com.</p>
    </details>
  </div>
</main>
@endsection