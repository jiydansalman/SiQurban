<!DOCTYPE html>
<html id=packages lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Packages Page</title>
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
  <body class="text-white" style="background-color: #875937;">
        <!-- Header Section -->
        <header class="relative w-full h-screen bg-cover bg-opacity-25 bg-center" 
            style="background-image: url('{{ asset('storage/images/ai_mati.jpg') }}');">
            <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4),#875937);"></div>
        </header>
        <!-- Navigation Bar -->
        <nav class="fixed top-0 left-0 w-full bg-transparent text-white py-4 px-8 flex justify-center space-x-6 z-50">
            <a href="/home" style="font-family: 'Actor', sans-serif;" class="relative inline-block after:block after:h-[2px] after:w-full after:bg-black after:scale-x-0 hover:after:scale-x-100 transition-all">Home</a>
            <a href="" style="font-family: 'Actor', sans-serif;" class="hover:underline">Packages</a>
            <a href="/tabunganku" style="font-family: 'Actor', sans-serif;" class="hover:underline">Tabunganku</a>
            <a href="/profile/edit" style="font-family: 'Afacad', sans-serif;" class="font-bold hover:underline">Profile</a>
        </nav>

        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <img src="{{ asset('storage/images/logo_putih.png') }}" alt="Logo Siddiq Qurban" class="absolute top-5 -mt-5 left-5 w-40">

            <h1 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-8xl">Packages</h1>
            <h4 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-xl">Home > Packages</h4>
            <!-- Search Bar -->
            <div class="relative mt-6 w-full max-w-md">
                <input type="text" placeholder="Search Packages"
                    class="w-full py-3 pl-10 pr-4 bg-white bg-opacity-40  text-white rounded-full focus:outline-none focus:ring-2 focus:ring-white placeholder-gray-100">
                <svg class="absolute left-3 top-3 text-gray-100 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
                </svg>
            </div>

            <!-- Button -->
            <button style="background-color: #FFFADF;" class="mt-4 px-5 py-4 text-black font-semibold rounded-lg cursor-pointer hover:opacity-80">
                <span style="font-family: 'Poppins', sans-serif; w-300" class="font-bold">Cari Hewan</span>
            </button>
        </div>


    <!-- Package Categories -->
    <section class="py-10 px-8">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold text-center mb-6">Pilihan paket hewan Qurban</h2>

      <!-- Bungkus categories dan tombol dalam 1 div -->
      <div class="flex flex-col items-start">
        <h4 class="font-bold mb-3" style="font-family: 'Actor', sans-serif;">Categories</h4>

        <div class="flex flex-wrap justify-center gap-5 mb-8  items-center">
          <a href="#" data-category="semua"
            class="kategori-hewan bg-[#F9F2EE] h-[105px] w-[349px] rounded-xl flex justify-center items-center transition-all duration-300">
            <img src="{{ asset('storage/images/Semua_Kategori.png') }}" class="h-24 object-contain"/>
          </a>

          <a href="#" data-category="sapi"
            class="kategori-hewan bg-[#EDD8A0] h-[105px] w-[349px] rounded-xl flex items-center justify-center transition-all duration-300">
            <img src="{{ asset('storage/images/Sapi_Kategori.png') }}" class="h-[105px] w-[349px] object-cover rounded-xl" />
          </a>

          <a href="#" data-category="kambing"
            class="kategori-hewan bg-[#E5D6C6] h-[105px] w-[349px] rounded-xl flex items-center transition-all duration-300">
            <img src="{{ asset('storage/images/Kambing_Kategori.png') }}" class="h-[105px] w-[349px] object-cover rounded-xl"/>
          </a>

          <a href="#" data-category="domba"
            class="kategori-hewan bg-[#D6C6B5] h-[105px] w-[349px] rounded-xl flex items-center transition-all duration-300">
            <img src="{{ asset('storage/images/Domba_Kategori.png') }}" class="h-[105px] w-[349px] object-cover rounded-xl" />
          </a>
        </div>
      </div>
    </div>
    <!-- Packages Grid -->
    <div id="card-container" class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <!-- Card item -->
    </div>
    </section>
  </body>
</html>


<script>
  const packages = [
    { category: 'sapi', name: 'Paket B', price: 25000000, image: "{{ asset('storage/images/sapi1.png') }}" },
    { category: 'sapi', name: 'Paket C', price: 27000000, image: "{{ asset('storage/images/sapi2.png') }}" },
    { category: 'kambing', name: 'Paket C', price: 2500000, image: "{{ asset('storage/images/kambing1.png') }}" },
    { category: 'domba', name: 'Paket C', price: 3000000, image: "{{ asset('storage/images/domba1.png') }}" },
    { category: 'kambing', name: 'Paket C', price: 1000000, image: "{{ asset('storage/images/kambing2.png') }}" },
    { category: 'sapi', name: 'Paket C', price: 27000000, image: "{{ asset('storage/images/sapi3.png') }}" },
    { category: 'kambing', name: 'Paket C', price: 2000000, image: "{{ asset('storage/images/kambing3.png') }}" },
    // Tambahkan item lain...
  ];

  const container = document.getElementById('card-container');
  function renderPackages(filtered) {
        container.innerHTML = "";
        filtered.forEach(pkg => {
          container.innerHTML += `
            <a href="/detailpackage" class="block bg-[#f5eedd] p-4 rounded-lg shadow-lg text-left hover:bg-[#f2e6cc] hover:scale-105 transition-shadow duration-300">
              <img src="${pkg.image}" alt="${pkg.name}" class="rounded-md w-full h-64 object-cover mb-4">
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

  document.querySelectorAll('[data-category]').forEach(link => {
        link.addEventListener('click', e => {
          e.preventDefault();
          const category = link.dataset.category;
          if (category === "semua") {
            renderPackages(packages);
          } else {
            const filtered = packages.filter(pkg => pkg.category === category);
            renderPackages(filtered);
          }
        });
  });
  const kategoriLinks = document.querySelectorAll('.kategori-hewan');

  kategoriLinks.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();

      // Hapus style aktif dari semua kategori
      kategoriLinks.forEach(l => {
        l.classList.remove('ring-4', 'ring-brown-500', 'scale-105');
      });

      // Tambahkan style aktif ke kategori yang diklik
      link.classList.add('ring-4', 'ring-brown-500', 'scale-105');

      const category = link.dataset.category;

      if (category === "semua") {
        renderPackages(packages);
      } else {
        const filtered = packages.filter(pkg => pkg.category === category);
        renderPackages(filtered);
      }
    });
  });
</script>