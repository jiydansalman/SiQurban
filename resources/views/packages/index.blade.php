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
            style="background-image: url('{{ asset('images/ai_mati.jpg') }}');">
            <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4),#875937);"></div>
        </header>
        <!-- Navigation Bar -->
        @include('partials.navbar')

        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <img src="{{ asset('images/logo_putih.png') }}" alt="Logo Siddiq Qurban" class="absolute top-6 mt-5 left-5 w-40">

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
                        <img src="{{ asset('images/Semua_Kategori.png') }}" class="h-24 object-contain"/>
                    </a>

                    <a href="#" data-category="sapi"
                        class="kategori-hewan bg-[#EDD8A0] h-[105px] w-[349px] rounded-xl flex items-center justify-center transition-all duration-300">
                        <img src="{{ asset('images/Sapi_Kategori.png') }}" class="h-[105px] w-[349px] object-cover rounded-xl" />
                    </a>

                    <a href="#" data-category="kambing"
                        class="kategori-hewan bg-[#E5D6C6] h-[105px] w-[349px] rounded-xl flex items-center transition-all duration-300">
                        <img src="{{ asset('images/Kambing_Kategori.png') }}" class="h-[105px] w-[349px] object-cover rounded-xl"/>
                    </a>

                    <a href="#" data-category="domba"
                        class="kategori-hewan bg-[#D6C6B5] h-[105px] w-[349px] rounded-xl flex items-center transition-all duration-300">
                        <img src="{{ asset('images/Domba_Kategori.png') }}" class="h-[105px] w-[349px] object-cover rounded-xl" />
                    </a>
                </div>
            </div>
        </div>

        <!-- Packages Grid -->
        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" id="card-container">
            @foreach($packages as $package)
                <a href="/packages/{{ $package->id }}" 
                class="block bg-[#f5eedd] p-4 rounded-lg shadow-lg text-left hover:bg-[#f2e6cc] hover:scale-105 transition-shadow duration-300 package-card"
                data-type="{{ strtolower($package->type) }}">
                    <img src="{{ asset('storage/' . $package->image_path) }}" 
                        alt="{{ $package->name }}" 
                        class="rounded-md w-full h-64 object-cover mb-4">
                    <div class="mt-2 flex items-center justify-between">
                        <div>
                            <h3 class="font-bold text-[#1a1a1a]">{{ $package->name }}</h3>
                            <p class="text-orange-600 mb-2">Rp{{ number_format($package->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        </section>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const categoryLinks = document.querySelectorAll(".kategori-hewan");
                const cards = document.querySelectorAll(".package-card");

                categoryLinks.forEach(link => {
                    link.addEventListener("click", function (e) {
                        e.preventDefault();

                    const category = this.getAttribute("data-category");

                        cards.forEach(card => {
                            const type = card.getAttribute("data-type");

                            if (category === "semua" || type === category) {
                                card.style.display = "block";
                            } else {
                                card.style.display = "none";
                            }
                        });
                    });
                });
            });
        </script>
    </body>
</html>
