<!DOCTYPE html>
<html id=detailpackage lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Package</title>
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
<body class="text-white" style="background-color: #FFE7D0;">
    <nav class="fixed h-24 top-0 left-0 w-full bg-[#875937]/70 text-white py-4 px-8 flex justify-center items-center space-x-6 z-50">
            <a href="/home" style="font-family: 'Actor', sans-serif;" class="relative inline-block after:block after:h-[2px] after:w-full after:bg-black after:scale-x-0 hover:after:scale-x-100 transition-all">Home</a>
            <a href="/packages" style="font-family: 'Actor', sans-serif;" class="hover:underline">Packages</a>
            <a href="/tabunganku" style="font-family: 'Actor', sans-serif;" class="hover:underline ">Tabunganku</a>
            <a href="/profile" style="font-family: 'Afacad', sans-serif;" class="font-bold hover:underline">Profile</a>
    </nav>
    <!-- Paket -->
    <section>
        <div class="flex flex-col grid grid-cols-1 md:grid-cols-2 gap-4 h-screen w-full mx-auto px-8 pt-24">
            <!-- bagian kiri Foto -->
            <div class="py-4">
                <img src="{{ asset('storage/images/sapi1.png') }}" class="w-full" alt="">
                
            </div>
            <!-- bagian kanan deskripsi -->
             <div class="flex flex-col py-3 px-3 text-black gap-1">
                <h1 class="font-bold text-8xl">Paket A</h1>
                <h2 class="font-semibold text-2xl ">Sapi</h2>
                <h3 class="font-semibold text-2xl ">Rp 30.000.000</h3>
                <p class="pt-4">Sapi limosin adalah jenis sapi potong berotot yang berasal dari daerah Limosin dan Marche di Perancis. Sapi limosin bertubuh besar, berbulu halus dan memiliki kerangka tulang yang kuat. Berat sapi limosin betina dewasa rata-rata 650 kg dan jantan dewasa 1000 kg.</p>
                <form action="/tabunganku">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="pt-2">
                            <h4 class="text-lg font-semibold">Pilih metode pembayaran: </h4>
                            <select name="Payment" id="payment" class="bg-[#875937]/30 rounded-xl h-[50px] w-[340px] p-3">
                                <option value="Gopay">Gopay</option>
                                <option value="Dana"> Dana</option>
                                <option value="Qris">Qoris</option>
                            </select>
                        </div>
                        <div class="pt-2">
                        <h4 class="text-lg font-semibold">Pilih tujuan pengiriman: </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div>
                                    <input type="radio" id="rumah" name="lokasi" value="Rumah" class="hidden peer">
                                    <label for="rumah" class="bg-[#875937]/30 hover:bg-[#875937]/50 rounded-xl w-[160px] h-[50px] flex items-center justify-center cursor-pointer peer-checked:bg-[#875937]/80">Rumah</label>
                                </div>
                                <div>
                                    <input type="radio" id="masjid" name="lokasi" value="Masjid" class="hidden peer">
                                    <label for="masjid" class="bg-[#875937]/30 hover:bg-[#875937]/50 rounded-xl w-[160px] h-[50px] flex items-center justify-center cursor-pointer peer-checked:bg-[#875937]/80">Masjid</label>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="font-semibold text-lg">Masukkan alamat:</h1>
                    <textarea 
                        placeholder="Jl. Karang Empat XII no.26 Surabaya, JawaTimur, Indonesia" 
                        class="bg-[#875937]/30 rounded-xl h-[120px] w-[690px] p-3 
                        align-top text-left resize-none placeholder-gray-100/40">
                    </textarea>
                    <div class="flex flex-cols justify-center items-center gap-2 py-4">
                        <a href="{{ route('packages') }}" class="bg-white/30 rounded-xl hover:bg-white/50 w-[350px] h-[50px] flex items-center justify-center">kembali</a>
                        <button type="submit" class="bg-[#875937]/30 rounded-xl hover:bg-[#875937]/50 w-[350px] h-[50px]">submit</button>
                    </div>
                </form>
             </div>

        </div>
    </section>
    <section>
        <div class="mx-auto px-9 py-4">
            <h1 class="text-black font-semibold text-xl">Recommended Package</h1>
            <div id="card-container" class="grid gap-6 py-3 sm:grid-cols-2 md:grid-cols-3 mx-auto">
            <!-- Card item -->
            </div>
        </div>
    </section>
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