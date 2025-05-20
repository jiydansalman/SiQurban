<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
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
    <header class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('storage/images/ai_mati.jpeg') }}');">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 w-full bg-transparent backdrop-blur-md text-white py-4 px-8 flex justify-center space-x-6 z-50">
        <a href="#" style="font-family: 'Actor', sans-serif;" class="relative inline-block after:block after:h-[2px] after:w-full after:bg-black after:scale-x-0 hover:after:scale-x-100 transition-all">Home</a>
        <a href="#popular-package" style="font-family: 'Actor', sans-serif;" class="hover:underline">Packages</a>
        <a href="#" style="font-family: 'Actor', sans-serif;" class="hover:underline">Tabunganku</a>
        <a href="{{ route('SignUp') }}" style="font-family: 'Afacad', sans-serif;" class="font-bold hover:underline">Sign Up</a>
    </nav>
    
    <!-- Hero Section -->
    <div class="absolute inset-0 bg-black bg-opacity-25 flex flex-col justify-center items-center text-white text-center">
        <img src="{{ asset('storage/images/logo_putih.png') }}" alt="Logo Siddiq Qurban" class="absolute top-5 left-5 w-40">
        
        <h1 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-8xl">Assalammualaikum,</h1>
        <h2 style="font-family: 'Berkshire Swash', sans-serif;" class="text-6xl">
            <span id="countdown-hari"></span> 
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
        <button style="background-color: #FFFADF;" class="mt-4 px-5 py-4 text-black font-semibold rounded-lg">
            <span style="font-family: 'Poppins', sans-serif; w-500" class="font-bold">Menabung Sekarang!!</span>
        </button>
    </div>
    </header>


    <!-- Tentang SiQurban -->
<section class="bg-[#7B5734] py-16 text-white">
    <div class="container mx-auto max-w-screen-xl px-10 lg:px-30">
        <!-- Layout Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-20">
            <!-- Kartu 1 -->
            <div class="p-6 rounded-xl shadow-lg relative overflow-hidden">
                <!-- Background Image -->
                <div class="absolute inset-0 bg-cover bg-bottom opacity-50" 
                     style="background-image: url('{{ asset('storage/images/Kambingmakan.jpg') }}');">
                </div>

                <!-- Overlay Transparan -->
                <div class="absolute inset-0 bg-[#7B5734] opacity-50"></div>

                
            </div>

            <!-- Kartu 2 -->
            <div class="p-6 rounded-xl shadow-lg relative overflow-hidden">
                <!-- Background Image -->
                <div class="absolute inset-0 bg-cover bg-center opacity-50"
                     style="background-image: url('{{ asset('storage/images/kambingmakan2.jpg') }}');">
                </div>

                <!-- Overlay Transparan -->
                <div class="absolute inset-0 bg-[#5A3E2B] opacity-50"></div>

                <div class="relative">
                    <h3 class="text-xl font-semibold mb-4" style="font-family: 'Berkshire Swash', sans-serif">"Qurban: Ibadah Mulia yang Mengalirkan Berkah"</h3>
                    <ul class="space-y-1">
                        <li>✅ Mendekatkan diri kepada Allah</li>
                        <li>✅ Mengikuti sunnah Nabi Ibrahim AS</li>
                        <li>✅ Berbagi kebahagiaan dengan sesama, terutama kaum dhuafa</li>
                        <li>✅ Sebagai wujud rasa syukur atas rezeki yang diberikan</li>
                    </ul>
                </div>
            </div>

            <!-- Kartu 3 -->
            <div class="p-6 rounded-xl shadow-lg relative overflow-hidden">
                <!-- Background Image -->
                <div class="absolute inset-0 bg-cover bg-center opacity-50"
                     style="background-image: url('{{ asset('storage/images/kambing_kecil.jpg') }}');">
                </div>

                <!-- Overlay Transparan -->
                <div class="absolute inset-0 bg-[#5A3E2B] opacity-50"></div>

                <div class="relative">
                <p class="text-sm leading-relaxed">
                    Qurban diwajibkan atau sangat dianjurkan bagi Muslim yang mampu. Jika memiliki kecukupan rezeki, sebaiknya jangan melewatkan kesempatan untuk berqurban dan berbagi kebahagiaan dengan sesama.
                </p>
                <p class="mt-4 text-yellow-300 font-semibold">💡 Oleh karena itu, <span class="text-white">SiQurban</span> bisa membantu Anda menabung sedikit demi sedikit agar bisa berqurban! 🐐✨</p>
                </div>
            </div>
        </div>

        <!-- Kutipan Hadis -->
        <p class="text-center text-lg italic mt-8">"مَنْ صَلَّى صَلَاتَنَا وَنَسَكَ نُسُكَنَا فَقَدْ أَصَابَ النُّسُكَ"</p>
    </div>
</section>

    <!-- Popular Packages -->
    <section id="popular-package" class="p-8 text-center" style="background-color: #FFF4E5; min-height: 400px;">
    <h2 class="text-4xl font-bold mb-6 underline" style="font-family: 'Abhaya Libre', sans-serif;">Popular Packages</h2>
    <div class="grid grid-cols-2 gap-12">
        <div class="p-2 border rounded-lg shadow-md">
            <img src="/storage/images/paketA.jpg" alt="Paket A" class="object-cover mx-auto block p-4 " style= "height: 300px; border-radius: 30px; ">
            <h3 class="mb-3 font-semibold text-3xl" style="font-family: 'Abhaya Libre', sans-serif;">Paket A</h3>
        </div>
        <div class="p-2 border rounded-lg shadow-md">
            <img src="/storage/images/PaketC.jpg" alt="Paket C" class="object-cover mx-auto block p-4 " style= "height: 300px;border-radius: 30px;">
            <h3 class="mb-3 font-semibold text-3xl" style="font-family: 'Abhaya Libre', sans-serif;">Paket C</h3>
        </div>
    </div>
</section>
            <button style="background-color: #FFFADF;" class="block mx-auto mt-8 px-5 py-4 text-black font-semibold rounded-lg cursor-pointer hover:opacity-80">
                <span style="font-family: 'Poppins', sans-serif; w-500" class="font-bold">More Package</span>
            </button>
    
    <!-- Download Mobile App -->
    <section class="p-8 text-center w-full h-screen" style= "background: linear-gradient(to bottom, #875937, #D2A679);">
    <div class="grid grid-cols-2 gap-2 w-full">
        <div class="ml-10">
            <h1 class="text-2xl font-bold text-left text-white" style="font-family: 'Poppins', sans-serif;">Check out our mobile app</h1>
            <p class="text-2xl font-bold text-left text-white" style="font-family: 'Poppins', sans-serif;">and download it now!</p>
            <img src="{{ asset('storage/images/mobileapp.png') }}" style="width: 548px; height:620px;">

        </div>
        <div class="grid grid-rows-2 gap-1">
            <h2 class="text-black text-center flex flex-col justify-end" style="font-family: 'Abhaya Libre', sans-serif; line-height: 0.8;">
                <span style="font-size: 28px;font-weight: bold">SiQurban 
                <span style="font-size: 16px;font-family: 'Poppins', sans-serif; font-weight: 500;"> adalah aplikasi mobile yang dikembangkan untuk membantu individu dalam merencanakan dan mengelola tabungan qurban secara lebih efektif.
            </h2>
            <div class="bg-[#c78b5a] flex flex-col items-center justify-center p-6">
                <!-- Ayat dan Terjemahan -->
                <div class="mx-auto mb-20 rounded-lg shadow-lg text-center md:w-65" style="background-color: #FFE7D0; height: 110px;">
                    <p class="text-3xl font-arabic mt-2 mb-2">فَصَلِّ لِرَبِّكَ وَانْحَرْ</p>
                    <p class="mx-auto text-lg font-sans p-2">"Maka dirikanlah salat karena Tuhanmu; dan berqurbanlah."</p>
                </div>
                <div class="mx-auto md:w-65 items-center max-w-[250px] ml-auto" >
                    <a href="#" class="inline-block bg-black text-white px-4 py-2 rounded-lg">Google Play</a>
                    <a href="#" class="inline-block bg-black text-white px-4 py-2 rounded-lg ml-2">App Store</a>
                </div>
            </div>

    </section>
</body>
</html>

<script>
    function updateCountdown() {
        // Tanggal Idul Adha 2025 (10 Dzulhijjah 1446H) -> 6 Juni 2025
        let targetDate = new Date("2025-06-06");

        // Tanggal hari ini
        let today = new Date();

        // Hitung selisih waktu dalam milidetik
        let timeDiff = targetDate - today;

        // Konversi ke jumlah hari
        let daysRemaining = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

        // Update angka countdown di halaman
        document.getElementById("countdown-hari").innerText = daysRemaining;
    }

    // Jalankan saat halaman dimuat
    updateCountdown();

    // Perbarui setiap hari
    setInterval(updateCountdown, 24 * 60 * 60 * 1000);
</script>

