<!DOCTYPE html>
<html id="home" lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiQurban - Mudahnya Menabung untuk Qurban</title>
    <meta name="description" content="Platform terpercaya untuk menabung qurban dengan sistem yang fleksibel dan mudah">
    <meta name="keywords" content="qurban, tabungan qurban, sapi, kambing, domba, idul adha">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        @keyframes slideInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.8; } }
        @keyframes shimmer { 0% { background-position: -1000px 0; } 100% { background-position: 1000px 0; } }
        @keyframes countdownPulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        
        .float-animation { animation: float 3s ease-in-out infinite; }
        .slide-in-up { animation: slideInUp 0.6s ease-out; }
        .fade-in { animation: fadeIn 0.8s ease-out; }
        .pulse-animation { animation: pulse 2s infinite; }
        .shimmer { background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent); background-size: 1000px 100%; animation: shimmer 2s infinite; }
        .countdown-number { animation: countdownPulse 2s infinite; }
        
        .glass-effect { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .card-hover { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 20px 40px rgba(135, 89, 55, 0.3); }
        .stats-card { background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); transition: all 0.3s ease; }
        .stats-card:hover { background: rgba(255, 255, 255, 0.25); transform: translateY(-4px); }
        .gradient-text { background: linear-gradient(135deg, #875937, #d4a574); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .text-stroke { text-shadow: -2px -2px 0 rgba(135,89,55,0.8), 2px -2px 0 rgba(135,89,55,0.8), -2px 2px 0 rgba(135,89,55,0.8), 2px 2px 0 rgba(135,89,55,0.8); }
        
        .locked-feature { position: relative; cursor: not-allowed; }
        .locked-feature::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(2px); z-index: 10; border-radius: inherit; }
        .locked-feature::after { content: '🔒'; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; z-index: 11; }
        
        .login-prompt { background: linear-gradient(135deg, rgba(212, 165, 116, 0.9), rgba(196, 149, 79, 0.9)); backdrop-filter: blur(10px); border: 2px solid rgba(255, 255, 255, 0.2); animation: float 3s ease-in-out infinite; }
    </style>
</head>

<body style="background-color: #875937;">
    <!-- Header Section -->
    <header class="relative w-full h-screen bg-cover bg-opacity-25 bg-center" style="background-image: url('images/ai_mati.jpg');">
        <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent 0%, transparent 40%, rgba(0, 0, 0, 0.2) 60%, rgba(0, 0, 0, 0.4) 75%, rgba(135, 89, 55, 0.8) 85%, #875937 100%);"></div>
        
        <!-- Limited Navigation Bar -->
        <nav class="fixed top-0 left-0 w-full glass-effect text-white py-4 px-8 flex justify-between items-center z-50">
            <div class="flex space-x-6">
                <a href="#home" style="font-family: 'Actor', sans-serif;" class="relative inline-block after:block after:h-[2px] after:w-full after:bg-white after:scale-x-0 hover:after:scale-x-100 transition-all">Home</a>
                <a href="#siqurban" style="font-family: 'Actor', sans-serif;" class="hover:text-[#d4a574] transition-colors">SiQurban</a>
                <a href="#packages" style="font-family: 'Actor', sans-serif;" class="hover:text-[#d4a574] transition-colors">Packages</a>
            </div>
            <div class="flex space-x-4">
                <a href="/login" style="font-family: 'Afacad', sans-serif;" class="px-4 py-2 border border-white/30 rounded-lg hover:bg-white/10 transition-all">Login</a>
                <a href="/signup" style="font-family: 'Afacad', sans-serif;" class="px-4 py-2 bg-[#d4a574] text-[#875937] font-bold rounded-lg hover:bg-[#c4954f] transition-all">Sign Up</a>
            </div>
        </nav>
        
        <!-- Hero Section -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center px-4">
            <img src="{{ asset('images/logo_putih.png') }}" 
                 alt="Logo Siddiq Qurban" 
                 class="absolute top-16 mt-5 left-5 w-40">
            
            <div class="mt-12 mb-6 fade-in">
                <h1 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-5xl md:text-7xl mb-4 text-stroke">Assalaamu'alaikum,</h1>
                <p class="text-xl md:text-2xl text-[#d4a574] font-semibold text-stroke" style="font-family: 'Poppins', sans-serif;">Selamat datang di SiQurban! 🐐</p>
            </div>
            
            <div class="mb-6 slide-in-up">
                <h2 style="font-family: 'Berkshire Swash', sans-serif;" class="text-3xl md:text-5xl mb-4">
                    <span id="countdown-number" class="countdown-number text-[#d4a574] font-bold shimmer text-stroke"></span> 
                    <span style="font-family: 'Abhaya Libre', sans-serif" class="text-white text-stroke"> Hari menuju</span>
                    <span style="font-family: 'Berkshire Swash', sans-serif" class="text-3xl md:text-5xl font-bold text-[#d4a574] text-stroke pulse-animation">Idul Adha!</span>
                </h2>
            </div>

            <!-- Disabled Search Bar -->
            <div class="w-full max-w-sm mb-4 fade-in z-10">
                <div class="relative locked-feature">
                    <input type="text" placeholder="Cari paket qurban..." disabled class="w-full py-3 pl-10 pr-4 glass-effect text-white rounded-2xl placeholder-gray-200 text-sm">
                    <svg class="absolute left-3 top-3 text-gray-200 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z"></path>
                    </svg>
                </div>
                <p class="text-xs text-[#d4a574] mt-2 text-center">Login untuk menggunakan fitur pencarian</p>
            </div>

            <!-- Login Prompt Banner -->
            <div class="mb-4 login-prompt rounded-2xl p-4 max-w-sm w-full slide-in-up">
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-5 h-5 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <h4 class="text-sm font-bold text-[#875937]">Mulai Perjalanan Qurban Anda!</h4>
                </div>
                <p class="text-xs text-[#875937] mb-3">Bergabunglah dengan ribuan Muslim yang sudah memulai tabungan qurban mereka</p>
                <a href="/signup" class="inline-block w-full text-center bg-[#875937] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#6d4529] transition-all">Daftar Sekarang</a>
            </div>

            <!-- Public Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 w-full max-w-4xl fade-in">
                <div class="stats-card p-3 rounded-xl text-center">
                    <h3 class="text-lg md:text-xl font-bold text-[#d4a574]" id="userCount">0</h3>
                    <p class="text-xs text-white/80">Pengguna Aktif</p>
                </div>
                <div class="stats-card p-3 rounded-xl text-center">
                    <h3 class="text-lg md:text-xl font-bold text-[#d4a574]" id="totalSavings">Rp 0</h3>
                    <p class="text-xs text-white/80">Total Tabungan</p>
                </div>
                <div class="stats-card p-3 rounded-xl text-center">
                    <h3 class="text-lg md:text-xl font-bold text-[#d4a574]" id="successfulQurban">0</h3>
                    <p class="text-xs text-white/80">Qurban Berhasil</p>
                </div>
                <div class="stats-card p-3 rounded-xl text-center">
                    <h3 class="text-lg md:text-xl font-bold text-[#d4a574]" id="availablePackages">5</h3>
                    <p class="text-xs text-white/80">Paket Tersedia</p>
                </div>
            </div>

        </div>
    </header>

    <!-- About SiQurban Section -->
    <section id="siqurban" class="relative bg-[#875937] py-16 text-white">
        <div class="relative container mx-auto max-w-screen-xl px-6 lg:px-12">
            <div class="text-center mb-12 slide-in-up">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 gradient-text" style="font-family: 'Berkshire Swash', sans-serif;">Tentang SiQurban</h2>
                <p class="text-xl text-[#d4a574] max-w-3xl mx-auto" style="font-family: 'Poppins', sans-serif;">Platform digital terpercaya untuk membantu umat Muslim mengelola tabungan qurban dengan mudah dan sistematis</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="card-hover p-8 rounded-2xl shadow-xl relative overflow-hidden flex flex-col justify-center items-center text-center glass-effect">
                    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('images/Kambingmakan.jpg');"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-[#d4a574] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-[#d4a574]" style="font-family: 'Berkshire Swash', sans-serif;">"SiQurban: Mudahnya Menabung untuk Qurban"</h3>
                        <p class="text-sm leading-relaxed text-white/90">Qurban adalah bentuk ketakwaan dan kepedulian terhadap sesama. Namun, banyak orang merasa sulit mengumpulkan dana untuk berqurban setiap tahun.</p>
                        <div class="mt-6 p-4 bg-[#d4a574]/20 rounded-xl">
                            <p class="text-sm font-semibold"><span class="text-[#d4a574]">SiQurban</span> hadir sebagai solusi! Dengan sistem tabungan yang fleksibel, Anda dapat menabung mingguan sesuai kemampuan.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="flex flex-col gap-6">
                    <div class="card-hover p-6 rounded-2xl shadow-xl relative overflow-hidden glass-effect">
                        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('images/Kambingmakan.jpg');"></div>
                        <div class="relative z-10">
                            <h4 class="text-xl font-semibold mb-4 text-[#d4a574]" style="font-family: 'Berkshire Swash', sans-serif;">"Manfaat Qurban"</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-[#d4a574]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="text-sm">Mendekatkan diri kepada Allah</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-[#d4a574]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="text-sm">Mengikuti sunnah Nabi Ibrahim AS</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-[#d4a574]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="text-sm">Berbagi dengan sesama</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-[#d4a574]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="text-sm">Wujud syukur atas rezeki</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card-hover p-6 rounded-2xl shadow-xl relative overflow-hidden glass-effect">
                        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('images/Kambingmakan.jpg');"></div>
                        <div class="relative z-10 text-center">
                            <div class="w-12 h-12 bg-[#d4a574] rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <p class="text-sm leading-relaxed mb-4">Jika memiliki kecukupan rezeki, sebaiknya jangan melewatkan kesempatan untuk berqurban dan berbagi kebahagiaan dengan sesama.</p>
                            <p class="text-[#d4a574] font-semibold text-sm">📍 <span class="text-white">SiQurban</span> membantu Anda menabung sedikit demi sedikit! 🐐✨</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card-hover rounded-2xl shadow-xl overflow-hidden glass-effect flex flex-col">
                    <div class="relative flex-1 flex items-center justify-center p-8">
                        <img src="images/Kambing.png" alt="Kambing Qurban" class="max-w-full h-auto object-contain float-animation" loading="lazy">
                    </div>
                    <div class="p-6 text-center bg-[#875937]/50">
                        <p class="text-lg italic mb-4 text-[#d4a574]" style="font-family: 'Poppins', sans-serif;">"مَنْ صَلَّى صَلَاتَنَا وَنَسَكَ نُسُكَنَا فَقَدْ أَصَابَ النُّسُكَ"</p>
                        <p class="text-sm italic text-white/90">"Siapa yang melaksanakan shalat seperti shalat kami, berkurban seperti yang kami lakukan, berarti kurbannya adalah benar"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Packages Section with Limited Access -->
    <section id="packages" class="relative bg-[#5A3E2B] py-16">
        <div class="container mx-auto max-w-screen-xl px-6 lg:px-12">
            <div class="text-center mb-12 slide-in-up">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 text-white" style="font-family: 'Poppins', sans-serif;">Popular Packages</h2>
                <p class="text-xl text-[#d4a574] max-w-2xl mx-auto">Pilihan paket qurban terpopuler dengan kualitas terbaik dan harga terjangkau</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- Package 1 -->
                <div class="relative">
                    <div class="card-hover relative rounded-2xl shadow-xl overflow-hidden h-96 group locked-feature">
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/PaketAKambing.png');"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-[#d4a574] text-[#875937] px-3 py-1 rounded-full text-sm font-bold">KAMBING</div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="font-bold text-2xl mb-2" style="font-family: 'Afacad', sans-serif;">Paket B Kambing</h3>
                            <p class="text-[#d4a574] text-lg font-semibold mb-2">Rp 2.500.000</p>
                            <p class="text-sm text-white/90">Kambing jenis Etawa dengan tinggi badan 91cm - 127cm</p>
                        </div>
                    </div>
                    <p class="text-xs text-[#d4a574] mt-2 text-center">Login untuk melihat detail</p>
                </div>

                <!-- Package 2 -->
                <div class="relative">
                    <div class="card-hover relative rounded-2xl shadow-xl overflow-hidden h-96 group locked-feature">
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/PaketC.png');"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-[#d4a574] text-[#875937] px-3 py-1 rounded-full text-sm font-bold">SAPI</div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="font-bold text-2xl mb-2" style="font-family: 'Afacad', sans-serif;">Paket C Sapi</h3>
                            <p class="text-[#d4a574] text-lg font-semibold mb-2">Rp 21.000.000</p>
                            <p class="text-sm text-white/90">Sapi Jenis Limousin dengan bobot 900kg - 1200kg</p>
                        </div>
                    </div>
                    <p class="text-xs text-[#d4a574] mt-2 text-center">Login untuk melihat detail</p>
                </div>

                <!-- Package 3 -->
                <div class="relative">
                    <div class="card-hover relative rounded-2xl shadow-xl overflow-hidden h-96 group locked-feature">
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/PaketBDomba.png');"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-[#d4a574] text-[#875937] px-3 py-1 rounded-full text-sm font-bold">DOMBA</div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="font-bold text-2xl mb-2" style="font-family: 'Afacad', sans-serif;">Paket B Domba</h3>
                            <p class="text-[#d4a574] text-lg font-semibold mb-2">Rp 3.333.333</p>
                            <p class="text-sm text-white/90">Domba Jenis Texel dengan bobot 50kg - 70kg</p>
                        </div>
                    </div>
                    <p class="text-xs text-[#d4a574] mt-2 text-center">Login untuk melihat detail</p>
                </div>
            </div>

            <!-- CTA Button with Login Redirect -->
            <div class="flex justify-center slide-in-up">
                <div class="text-center">
                    <button onclick="showLoginPrompt()" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#d4a574] to-[#c4954f] text-[#875937] font-bold rounded-2xl hover:from-[#c4954f] hover:to-[#d4a574] transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl mb-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span style="font-family: 'Poppins', sans-serif;">Lihat Semua Paket</span>
                    </button>
                    <p class="text-xs text-[#d4a574]">Masuk untuk mengakses semua fitur</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App Section -->
    <section class="relative py-16 text-center min-h-screen flex items-center" style="background: linear-gradient(135deg, #875937 0%, #D2A679 100%);">
        <div class="container mx-auto max-w-screen-xl px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Side: App Preview -->
                <div class="flex justify-center lg:justify-start slide-in-up">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-[#d4a574] to-[#c4954f] rounded-2xl blur opacity-30 animate-pulse"></div>
                        <img src="images/mobileapp.png" alt="SiQurban Mobile App" class="relative w-80 md:w-96 h-auto object-contain float-animation" loading="lazy">
                    </div>
                </div>

                <!-- Right Side: App Info -->
                <div class="space-y-8 fade-in">
                    <div class="text-left">
                        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4" style="font-family: 'Poppins', sans-serif;">SiQurban Mobile</h2>
                        <p class="text-lg text-white/90 leading-relaxed" style="font-family: 'Poppins', sans-serif;">Aplikasi mobile yang dikembangkan untuk membantu individu dalam merencanakan dan mengelola tabungan qurban secara lebih efektif dengan fitur-fitur canggih dan user-friendly.</p>
                    </div>

                    <!-- Features List -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 glass-effect p-4 rounded-xl">
                            <svg class="w-6 h-6 text-[#d4a574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path></svg>
                            <span class="text-white font-medium">Tabungan Otomatis</span>
                        </div>
                        <div class="flex items-center gap-3 glass-effect p-4 rounded-xl">
                            <svg class="w-6 h-6 text-[#d4a574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-white font-medium">Reminder Cerdas</span>
                        </div>
                        <div class="flex items-center gap-3 glass-effect p-4 rounded-xl">
                            <svg class="w-6 h-6 text-[#d4a574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span class="text-white font-medium">Progress Tracking</span>
                        </div>
                        <div class="flex items-center gap-3 glass-effect p-4 rounded-xl">
                            <svg class="w-6 h-6 text-[#d4a574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span class="text-white font-medium">Komunitas</span>
                        </div>
                    </div>

                    <!-- Quran Verse Card -->
                    <div class="glass-effect p-6 rounded-2xl text-center">
                        <div class="bg-gradient-to-r from-[#d4a574] to-[#c4954f] text-[#875937] p-6 rounded-xl mb-4">
                            <p class="text-2xl md:text-3xl font-arabic mb-3" style="font-family: 'Abhaya Libre', serif;">فَصَلِّ لِرَبِّكَ وَانْحَرْ</p>
                            <p class="text-lg font-medium">"Maka dirikanlah salat karena Tuhanmu; dan berqurbanlah."</p>
                            <p class="text-sm opacity-80 mt-2">QS. Al-Kautsar: 2</p>
                        </div>
                    </div>

                    <!-- Download Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#" class="inline-flex items-center gap-3 bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition-colors duration-300">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.6 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.53,12.9 20.18,13.18L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L6.05,2.66Z"/></svg>
                            <div class="text-left">
                                <div class="text-xs">GET IT ON</div>
                                <div class="text-sm font-semibold">Google Play</div>
                            </div>
                        </a>
                        <a href="#" class="inline-flex items-center gap-3 bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition-colors duration-300">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M18.71,19.5C17.88,20.74 17,21.95 15.66,21.97C14.32,22 13.89,21.18 12.37,21.18C10.84,21.18 10.37,21.95 9.1,22C7.79,22.05 6.8,20.68 5.96,19.47C4.25,17 2.94,12.45 4.7,9.39C5.57,7.87 7.13,6.91 8.82,6.88C10.1,6.86 11.32,7.75 12.11,7.75C12.89,7.75 14.37,6.68 15.92,6.84C16.57,6.87 18.39,7.1 19.56,8.82C19.47,8.88 17.39,10.1 17.41,12.63C17.44,15.65 20.06,16.66 20.09,16.67C20.06,16.74 19.67,18.11 18.71,19.5M13,3.5C13.73,2.67 14.94,2.04 15.94,2C16.07,3.17 15.6,4.35 14.9,5.19C14.21,6.04 13.07,6.7 11.95,6.61C11.8,5.46 12.36,4.26 13,3.5Z"/></svg>
                            <div class="text-left">
                                <div class="text-xs">Download on the</div>
                                <div class="text-sm font-semibold">App Store</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Login Prompt -->
    <div id="loginModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 transform transition-all">
            <div class="text-center">
                <div class="w-16 h-16 bg-[#875937] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-[#875937] mb-4" style="font-family: 'Poppins', sans-serif;">Akses Terbatas</h3>
                <p class="text-gray-600 mb-6">Untuk mengakses semua fitur SiQurban termasuk detail paket dan fitur tabungan, silakan masuk ke akun Anda atau daftar terlebih dahulu.</p>
                <div class="flex gap-3">
                    <button onclick="closeLoginModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Tutup</button>
                    <a href="/login" class="flex-1 px-4 py-2 bg-[#875937] text-white rounded-lg hover:bg-[#6d4529] transition-colors text-center">Login</a>
                    <a href="/signup" class="flex-1 px-4 py-2 bg-[#d4a574] text-[#875937] rounded-lg hover:bg-[#c4954f] transition-colors text-center font-semibold">Daftar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateCountdown() {
            const targetDate = new Date("2026-05-26");
            const today = new Date();
            const timeDiff = targetDate - today;
            const daysRemaining = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
            const countdownElement = document.getElementById("countdown-number");
            if (countdownElement) {
                countdownElement.innerText = daysRemaining;
            }
        }

        function showLoginPrompt() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLoginModal();
            }
        });

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', function() {
            updateCountdown();
            setInterval(updateCountdown, 24 * 60 * 60 * 1000);

            document.querySelectorAll('.slide-in-up, .fade-in, .card-hover').forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(element);
            });

            const statsCards = document.querySelectorAll('.stats-card');
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target.querySelector('h3');
                        if (counter && !counter.dataset.animated) {
                            animateCounter(counter);
                            counter.dataset.animated = 'true';
                        }
                    }
                });
            }, observerOptions);

            statsCards.forEach(card => statsObserver.observe(card));

            document.querySelectorAll('.locked-feature').forEach(element => {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    showLoginPrompt();
                });
            });
        });

        function animateCounter(element) {
            const originalText = element.textContent;
            const target = parseInt(originalText.replace(/[^\d]/g, ''));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                
                if (originalText.includes('Rp')) {
                    element.textContent = `Rp ${Math.floor(current).toLocaleString('id-ID')}`;
                } else {
                    element.textContent = Math.floor(current).toLocaleString('id-ID');
                }
            }, 16);
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('loginModal').classList.contains('hidden')) {
                closeLoginModal();
            }
        });
    </script>
</body>
</html>