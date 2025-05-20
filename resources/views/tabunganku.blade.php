<!DOCTYPE html>
<html id=tabunganku lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tabunganku</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Afacad&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body class="text-black" style="background-color: #FFE7D0;">
        <header class="relative w-full h-screen bg-cover bg-opacity-25 bg-center" 
            style="background-image: url('{{ asset('storage/images/bg-tabunganku.jpg') }}');">
            <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4),#FFE7D0);"></div>
        </header>
        <!-- Navigation Bar -->
        <nav class="fixed top-0 left-0 w-full bg-transparent text-white py-4 px-8 flex justify-center space-x-6 z-50">
            <a href="/home" style="font-family: 'Actor', sans-serif;" class="relative inline-block after:block after:h-[2px] after:w-full after:bg-black after:scale-x-0 hover:after:scale-x-100 transition-all">Home</a>
            <a href="/packages" style="font-family: 'Actor', sans-serif;" class="hover:underline">Packages</a>
            <a href="/tabunganku" style="font-family: 'Actor', sans-serif;" class="hover:underline">Tabunganku</a>
            <a href="/profile/edit" style="font-family: 'Afacad', sans-serif;" class="font-bold hover:underline">Profile</a>
        </nav>

        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <img src="{{ asset('storage/images/logo_putih.png') }}" alt="Logo Siddiq Qurban" class="absolute top-5 -mt-5 left-5 w-40">

            <h1 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-8xl">Tabunganku</h1>
            <h4 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-xl">Home > Tabunganku</h4>
        </div>
  <!-- Main Content -->
  <main class="max-w-screen mx-auto px-10 py-10">
    <p class="text-lg mb-4">Assalamualaikum <em class="font-semibold italic">shaina</em>,<br />sudahkah kamu menabung hari ini?</p>

    <div class="grid md:grid-cols-2 gap-6">
      <!-- Paket Info -->
      <div class="flex flex-col items-center">
        <h2 class="text-xl font-semibold mb-2">Paket A</h2>
        <img src="{{ asset('storage/images/sapianimasi.png') }}" alt="cow" class="h-48 mb-4">
        <h3 class="bg-white px-3 w-48 font-bold flex justify-center text-xl">Rp 30.000.000</h3>
        <p class="text-sm text-center mt-2">Sapi Merah atau biasa dikenal sebagai sapi madura dengan kisaran bobot 300-350 kg. Dengan kondisi sehat dan layak untuk menjadi hewan qurban.</p>
      </div>

      <!-- Progress Tabungan -->
      <div>
        <h2 class="font-semibold text-xl">Progress Tabungan</h2>
        <p class="mb-4">Rp0 / Rp30.000.000</p>

        <div class="grid grid-cols-4 gap-3 mb-6">
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 1</div>
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 2</div>
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 3</div>
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 4</div>
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 5</div>
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 6</div>
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 7</div>
          <div style="background-color: #DFA682;" class="h-[120px] rounded p-3 text-center">Week 8</div>
        </div>
      </div>
    </div>
    <form action="/tabunganku">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6">
          <div class="pt-2 text-black">
            <h1 class="text-lg font-semibold pb-2">Tabunganku</h1>
            <div class="mb-4">
              <h2 class="text-xl font-semibold rounded-xl bg-white/60 px-2">Metode Pembayaran:</h2>
              <h3 class="text-lg font-semibold pl-2">Gopay</h3>
            </div>
            <div  class="">
              <h2 class="text-xl font-semibold rounded-xl bg-white/60 px-2">Alamat: </h2>
              <h3 class="text-lg font-semibold pl-2">Karang Empat x no.26</h3>
            </div>
          </div>
          <div class="pt-2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
              <div>
                <h4 class="text-lg font-semibold">Pilih metode pembayaran: </h4>
                  <select name="Payment" id="payment" class="bg-[#875937]/30 rounded-xl h-[50px] w-[340px] p-3">
                    <option value="Gopay">Gopay</option>
                    <option value="Dana"> Dana</option>
                    <option value="Qris">Qoris</option>
                </select>
              </div>
              <div>
                <h4 class="text-lg font-semibold">Pilih tujuan pengiriman: </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                  <div>
                    <input type="radio" id="rumah" name="lokasi" value="Rumah" class="hidden peer">
                    <label for="rumah" class="bg-[#875937]/30 hover:bg-[#875937]/50 rounded-xl w-full h-[50px] flex items-center justify-center cursor-pointer peer-checked:bg-[#875937]/80">Rumah</label>
                  </div>
                  <div>
                    <input type="radio" id="masjid" name="lokasi" value="Masjid" class="hidden peer">
                    <label for="masjid" class="bg-[#875937]/30 hover:bg-[#875937]/50 rounded-xl w-full h-[50px] flex items-center justify-center cursor-pointer peer-checked:bg-[#875937]/80">Masjid</label>
                  </div>
                </div>
              </div>
            </div>
            <h1 class="font-semibold text-lg">Masukkan alamat:</h1>
            <textarea 
              placeholder="Jl. Karang Empat XII no.26 Surabaya, JawaTimur, Indonesia" 
              class="bg-[#875937]/30 rounded-xl h-[120px] w-full p-3 
              align-top text-left resize-none placeholder-gray-100/40">
            </textarea>
            <div class="flex flex-cols justify-center items-center gap-2 py-4">
              <button type="Update" class="bg-black/50 rounded-xl hover:bg-[#875937]/50 w-full h-[50px]">Update</button>
            </div>
          </div>
        </div>
    </form>
    <!-- Popular Packages -->
    <section>
        <div class="mx-auto px-9 py-4">
            <h1 class="text-black font-semibold text-xl">Recommended Package</h1>
            <div id="card-container" class="grid gap-6 py-3 sm:grid-cols-2 md:grid-cols-3 mx-auto">
            <!-- Card item -->
            </div>
        </div>
    </section>
  </main>
</body>
</html>

<script>
  const packages = [
    { category: 'sapi', name: 'Paket C', price: 27000000, image: "{{ asset('storage/images/sapi2.png') }}" },
    { category: 'kambing', name: 'Paket C', price: 2500000, image: "{{ asset('storage/images/kambing1.png') }}" },
    { category: 'domba', name: 'Paket C', price: 3000000, image: "{{ asset('storage/images/domba1.png') }}" },
    // Tambahkan item lain...
  ];

  const container = document.getElementById('card-container');
  function renderPackages(filtered) {
        container.innerHTML = "";
        filtered.forEach(pkg => {
          container.innerHTML += `
            <a href="/detailpackage" class="block bg-[#f5eedd] p-4 h-[420px] rounded-lg shadow-lg text-left hover:bg-[#f2e6cc] hover:scale-105 transition-shadow duration-300 ">
              <img src="${pkg.image}" alt="${pkg.name}" class="rounded-sm w-full h-[320px] object-cover mb-4">
              <div class="mt-2 flex items-center justify-between">
                <div>
                  <h3 class="font-bold text-[#1a1a1a]">${pkg.name}</h3>
                  <p class="text-orange-600 mb-2">Rp${pkg.price.toLocaleString('id-ID')}</p>
                </div>
              </div>
            </a>
          `;
        });
    }

  renderPackages(packages);
</script>