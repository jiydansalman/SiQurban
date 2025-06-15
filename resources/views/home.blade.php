<!DOCTYPE html>
    <html id="home" lang="id" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SiQurban - Mudahnya Menabung untuk Qurban</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Afacad&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body style="background-color: #875937;">
        <!-- Header Section -->
        <header class="relative w-full h-screen bg-cover bg-opacity-25 bg-center" 
            style="background-image: url('{{ asset('images/ai_mati.jpg') }}');">
            <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4),#875937);"></div>
        </header>
        <!-- Navigation Bar -->
        <nav class="fixed top-0 left-0 w-full bg-transparent backdrop-blur-md text-white py-4 px-8 flex justify-center space-x-6 z-50">
            <a href="#" style="font-family: 'Actor', sans-serif;" class="relative inline-block after:block after:h-[2px] after:w-full after:bg-black after:scale-x-0 hover:after:scale-x-100 transition-all">Home</a>
            <a href="/packages" style="font-family: 'Actor', sans-serif;" class="hover:underline">Packages</a>
            <a href="/tabunganku" style="font-family: 'Actor', sans-serif;" class="hover:underline">Tabunganku</a>
            <a href="/profile/edit" style="font-family: 'Afacad', sans-serif;" class="font-bold hover:underline">Profile</a>
        </nav>
        
        <!-- Hero Section -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <img src="{{ asset('images/logo_putih.png') }}" alt="Logo Siddiq Qurban" class="absolute top-5 -mt-5 left-5 w-40">
            
            <h1 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-8xl">Assalaamu'alaikum,</h1>
            <h2 style="font-family: 'Berkshire Swash', sans-serif;" class="text-6xl">
                <span id="countdown-number"></span> 
                <span style="font-family: 'Abhaya Libre', sans-serif"> Hari menuju 
                <span style="font-family: 'Berkshire Swash', sans-serif" class="font-bold">Idul Adha!</span>
            </h2>

            <!-- Search Bar -->
            <div class="relative mt-6 w-full max-w-md">
                <input type="text" placeholder="Search Packages"
                    class="w-full py-3 pl-10 pr-4 bg-white bg-opacity-30 backdrop-blur-md text-white rounded-full focus:outline-none focus:ring-2 focus:ring-white placeholder-gray-100">
                <svg class="absolute left-3 top-3 text-gray-100 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
                </svg>
            </div>
            
            <!-- Button -->
            <button style="background-color: #FFFADF;" class="mt-4 px-5 py-4 text-black font-semibold rounded-lg cursor-pointer hover:opacity-80">
                <span style="font-family: 'Poppins', sans-serif; w-500" class="font-bold">Menabung Sekarang!!</span>
            </button>
        </div>
        </header>


        <!-- Tentang SiQurban -->
        <section id="siqurban" class="relative bg-[#875937] py-16 text-white">
        <div class="relative container mx-auto max-w-screen-xl px-10 lg:px-30 ">
            <!-- Layout Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kartu 1 -->
                <div class="p-6 rounded-xl shadow-lg relative overflow-hidden flex flex-col justify-center items-center text-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 bg-cover bg-bottom opacity-25" 
                     style="background-image: url('{{ asset('images/Kambingmakan.jpg') }}');">
                    </div>

                    <!-- Overlay Transparan -->
                    <div class="absolute inset-0 bg-[#7B5734] opacity-75"></div>
                    <div class="relative">
                    <h2 class="text-2xl font-bold font-serif mb-4" style="font-family: 'Berkshire Swash', sans-serif">"SiQurban: Mudahnya Menabung untuk Qurban"</h2>
                    <p class="text-sm leading-relaxed">
                        Qurban adalah bentuk ketakwaan dan kepedulian terhadap sesama. Namun, banyak orang merasa sulit mengumpulkan dana untuk berqurban setiap tahun.
                        <br><br>
                        <span class="font-semibold">SiQurban</span> hadir sebagai solusi! Dengan sistem tabungan yang fleksibel, Anda dapat menabung mingguan sesuai kemampuan, mendapatkan rekomendasi hewan qurban, serta menerima pengingat otomatis agar tetap konsisten.
                    </p>
                    <p class="mt-4 text-center font-semibold italic">
                        Mulai perjalanan qurban Anda hari ini dengan <span class="text-yellow-300">SiQurban!</span>
                    </p>
                    </div>
                </div>

                <!-- Kartu 2 -->
                <div class="bg-[#5A3E2B] flex flex-col gap-6">
                    <div class= "p-6 rounded-xl shadow-lg relative overflow-hidden flex flex-col items-center">
                        <!-- Background Image -->
                        <div class="absolute inset-0 bg-cover bg-bottom opacity-25" 
                        style="background-image: url('{{ asset('images/Kambingmakan.jpg') }}');">
                        </div>

                        <!-- Overlay Transparan -->
                        <div class="absolute inset-0 bg-[#7B5734] opacity-75"></div>
                        <div class="relative">
                            <h3 class="text-xl font-semibold mb-4 text-center" style="font-family: 'Berkshire Swash', sans-serif">"Qurban: Ibadah Mulia yang Mengalirkan Berkah"</h3>
                            <ul class="space-y-1">
                                <li>✅ Mendekatkan diri kepada Allah</li>
                                <li>✅ Mengikuti sunnah Nabi Ibrahim AS</li>
                                <li>✅ Berbagi kebahagiaan dengan sesama, terutama kaum dhuafa</li>
                                <li>✅ Sebagai wujud rasa syukur atas rezeki yang diberikan</li>
                            </ul>
                        </div>
                    </div>
                    <div class= "p-6 rounded-xl shadow-lg relative overflow-hidden flex flex-col items-center">
                        <!-- Background Image -->
                        <div class="absolute inset-0 bg-cover bg-bottom opacity-25" 
                        style="background-image: url('{{ asset('images/Kambingmakan.jpg') }}');">
                        </div>

                        <!-- Overlay Transparan -->
                        <div class="absolute inset-0 bg-[#7B5734] opacity-75"></div>
                        <div class="relative text-center">
                            <p class="text-sm leading-relaxed mt-10">
                                Qurban diwajibkan atau sangat dianjurkan bagi Muslim yang mampu. Jika memiliki kecukupan rezeki, sebaiknya jangan melewatkan kesempatan untuk berqurban dan berbagi kebahagiaan dengan sesama.
                            </p>
                            <p class="mt-4 text-yellow-300 font-semibold leading-relaxed mt-15 mb-20">📍 Oleh karena itu, <span class="text-white">SiQurban</span> bisa membantu Anda menabung sedikit demi sedikit agar bisa berqurban! 🐐✨</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu 3 -->
                <div class="bg-[#5A3E2B] justify-center item-center text-center">
                    <img src="{{ asset('images/Kambing.png') }}" class="w-[548px] h-[620px]">
                    <p class="text-center text-lg italic mt-8">"مَنْ صَلَّى صَلَاتَنَا وَنَسَكَ نُسُكَنَا فَقَدْ أَصَابَ النُّسُكَ"</p>
                    <p class="text-center text-lg italic mt-8">Siapa yang melaksanakan shalat seperti shalat kami, berkurban seperti yang kami lakukan, berarti kurbannya adalah benar</p>
                </div>
            </div>
        </div>
        </section>

        <!-- Popular Packages -->
        <section id="packages"class="relative container bg-[#5A3E2B] mx-auto p-8 max-w-screen-xl px-10 lg:px-30 " >
            <h2 class="text-4xl font-bold mb-6 underline text-center" style="font-family: 'Poppins', sans-serif;">Popular Packages</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 mt-10">
                <div class="relative p-4 border rounded-lg shadow-md h-96">
                    <div class="absolute rounded-lg inset-0 bg-cover bg-bottom" 
                        style="background-image: url('{{ asset('images/PaketAKambing.png') }}');">
                    </div>
                    <div class="relative text-white" style="text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">
                        <h3 class="font-semibold text-3xl" style="font-family: 'Afacad', sans-serif;">Paket B   <span class="text-lg text-yellow-300">Kambing</h3>
                        <h1 class="font-semibold text-xl" style="font-family: 'Afacad', sans-serif;">Kambing jenis Etawa dengan tinggi badan 91cm - 127cm</h1>
                    </div>
                </div>
                <div class="relative p-4 border rounded-lg shadow-md h-96">
                    <div class="absolute rounded-lg inset-0 bg-cover bg-bottom" 
                        style="background-image: url('{{ asset('images/PaketC.png') }}');">
                    </div>
                    <div class="relative text-white" style="text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">
                        <h3 class="font-semibold text-3xl" style="font-family: 'Afacad', sans-serif;">Paket C  <span class="text-lg text-yellow-300">Sapi</h3>
                        <h1 class="font-semibold text-xl" style="font-family: 'Afacad', sans-serif;">Sapi Jenis Limousin dengan bobot 900kg - 1200kg</h1>
                    </div>
                </div>
                <div class="relative p-4 border rounded-lg shadow-md h-96">
                    <div class="absolute rounded-lg inset-0 bg-cover bg-bottom" 
                        style="background-image: url('{{ asset('images/PaketBDomba.png') }}');">
                    </div>
                    <div class="relative text-white" style="text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">
                        <h3 class="font-semibold text-3xl" style="font-family: 'Afacad', sans-serif;">Paket B  <span class="text-lg text-yellow-300">Domba</h3>
                        <h1 class="font-semibold text-xl" style="font-family: 'Afacad', sans-serif;">Domba Jenis Texel dengan bobot 50kg - 70kg</h1>
                    </div>
                </div>
            </div>
            <!-- buttonnn -->
            <div class="flex justify-center mt-8">
                <a href="/packages"
                    style="background-color: #FFFADF;"
                    class="inline-block px-6 py-3 text-black text-base sm:text-lg font-semibold rounded-lg cursor-pointer hover:opacity-80 text-center">
                    <span class="font-bold">More Package</span>
                </a>
            </div>

        </section>
        
        <!-- Download Mobile App -->
        <section class="p-8 text-center w-full h-auto min-h-screen" style="background: linear-gradient(to bottom, #875937, #D2A679);">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full items-center">
                <!-- Bagian Kiri: Teks dan Gambar -->
                <div class="ml-10 w-full">
                    <h1 class="text-2xl font-bold text-left text-white" style="font-family: 'Poppins', sans-serif;">
                        Check out our mobile app
                    </h1>
                    <p class="text-2xl font-bold text-left text-white" style="font-family: 'Poppins', sans-serif;">
                        and download it now!
                    </p>
                    <img src="{{ asset('images/mobileapp.png') }}" style="width: 528px; height: 600px;px;">
                </div>

                <!-- Bagian Kanan: Deskripsi, Ayat, dan Tombol Download -->
                <div class="flex flex-col items-center justify-center w-11/12 md:w-4/5">
                    <h2 class="text-black text-center" style="font-family: 'Abhaya Libre', sans-serif; line-height: 1.2;">
                        <span style="font-size: 28px; font-weight: bold;">SiQurban Mobile</span>
                        <br>
                        <span style="font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 500;">
                            adalah aplikasi mobile yang dikembangkan untuk membantu individu dalam merencanakan dan mengelola tabungan qurban secara lebih efektif.
                        </span>
                    </h2>

                    <!-- Ayat dan Terjemahan -->
                    <div class="bg-[#c78b5a] flex flex-col items-center justify-center p-6 mt-4 w-full">
                        <div class="mx-auto mb-6 rounded-lg shadow-lg text-center w-4/5" style="background-color: #FFE7D0; height: 120px;">
                            <p class="text-3xl font-arabic mt-2 mb-2">فَصَلِّ لِرَبِّكَ وَانْحَرْ</p>
                            <p class="text-lg font-sans p-2 ">
                                "Maka dirikanlah salat karena Tuhanmu; dan berqurbanlah."
                            </p>
                        </div>
                    
                        <!-- Tombol Download -->
                        <div class="mt-4">
                            <a href="#" class="inline-block bg-black text-white px-4 py-2 rounded-lg">Google Play</a>
                            <a href="#" class="inline-block bg-black text-white px-4 py-2 rounded-lg ml-2">App Store</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>
    </html>

    <script>
        function updateCountdown() {
            // Tanggal Idul Adha 2025 (10 Dzulhijjah 1446H) -> 6 Juni 2024
            let targetDate = new Date("2026-05-26");

            // Tanggal hari ini
            let today = new Date();

            // Hitung selisih waktu dalam milidetik
            let timeDiff = targetDate - today;

            // Konversi ke jumlah hari
            let daysRemaining = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

            // Update angka countdown di halaman
            document.getElementById("countdown-number").innerText = daysRemaining;
        }

        // Jalankan saat halaman dimuat
        updateCountdown();

        // Perbarui setiap hari
        setInterval(updateCountdown, 24 * 60 * 60 * 1000);
    </script>

