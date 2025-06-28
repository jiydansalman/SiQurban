<html id="detailpackage" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Package - {{ $package->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Actor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Afacad&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(135, 89, 55, 0.3); }
            50% { box-shadow: 0 0 30px rgba(135, 89, 55, 0.6); }
        }
        
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #875937, #d4a574);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .mobile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: slideInUp 0.6s ease-out;
        }
        
        .period-option {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .period-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .period-option:hover::before {
            left: 100%;
        }
        
        .period-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(135, 89, 55, 0.15);
        }
        
        .period-option.selected {
            background: linear-gradient(135deg, #875937,rgb(255, 246, 236));
            color: white;
            transform: scale(1.02);
            box-shadow: 0 12px 30px rgba(135, 89, 55, 0.3);
        }
        
        .period-option.selected:hover {
            transform: translateY(-2px) scale(1.02);
        }
        
        .savings-card {
            position: relative;
            overflow: hidden;
        }
        
        .savings-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .savings-card:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="text-white overflow-x-hidden" style="background: linear-gradient(135deg, #FFE7D0 0%, #F4D1AE 50%, #E8C5A0 100%);">
    <!-- Original Enhanced Navigation -->
    <nav class="fixed top-0 left-0 w-full bg-white/10 backdrop-blur-md border-b border-white/20 text-white py-6 px-8 flex justify-center space-x-10 z-50 transition-all duration-300">            <a href="/home" style="font-family: 'Actor', sans-serif;" class="relative text-base font-normal hover:text-white transition-colors duration-300 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:-bottom-1 after:transition-all after:duration-300 hover:after:w-full mt-4">Home</a>
        <a href="/packages" style="font-family: 'Actor', sans-serif;" class="relative text-base font-normal hover:text-white transition-colors duration-300 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:-bottom-1 after:transition-all after:duration-300 hover:after:w-full mt-4">Packages</a>
        <a href="/tabunganku" style="font-family: 'Actor', sans-serif;" class="relative text-base font-medium text-white after:content-[''] after:absolute after:w-full after:h-0.5 after:bg-white after:left-0 after:-bottom-1 mt-4">Tabunganku</a>
        <a href="/profile/edit" style="font-family: 'Actor', sans-serif;" class="relative text-base font-normal hover:text-white transition-colors duration-300 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:-bottom-1 after:transition-all after:duration-300 hover:after:w-full mt-4">Profile</a>
    </nav>

    <!-- Package Detail Section -->
    <section class="pt-32 px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Info Paket -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12 items-stretch">
                <!-- Left Side - Clean Image -->
                <div class="flex flex-col h-full">
                    <div class="relative h-full min-h-[500px] float-animation">
                        <img src="{{ asset('storage/' . $package->image_path) }}" 
                             class="w-full h-full object-cover rounded-2xl" 
                             alt="{{ $package->name }}">
                        <div class="absolute top-6 left-6 bg-[#875937] text-white px-4 py-2 rounded-full text-sm font-bold">
                            {{ strtoupper($package->type) }}
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Package Info -->
                <div class="flex flex-col h-full min-h-[500px]">
                    <!-- Package Title & Price -->
                    <div class="mb-6">
                        <h1 class="font-bold text-6xl md:text-8xl gradient-text mb-4">{{ $package->name }}</h1>
                        <h2 class="font-semibold text-3xl text-[#875937] mb-4">{{ ucfirst($package->type) }}</h2>
                        <div class="bg-gradient-to-r from-[#d4a574] to-[#c4954f] px-6 py-4 rounded-xl inline-block">
                            <h3 class="font-bold text-4xl text-[#875937] shimmer">Rp {{ number_format($package->price, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                    
                    <!-- Description Card - Takes remaining space -->
                    <div class="mobile-card p-8 flex-1 flex flex-col">
                        <h4 class="font-bold text-2xl mb-4 text-[#875937] flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Deskripsi Paket
                        </h4>
                        <div class="flex-1 flex items-center">
                            <p class="text-gray-700 leading-relaxed text-lg">
                                {{ $package->description ?? 'Paket ' . $package->type . ' berkualitas tinggi untuk qurban Anda. Hewan sehat dan terjamin kualitasnya sesuai syariat Islam dengan sertifikat halal dan kesehatan yang lengkap.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Simulasi & Form Section -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-12 mb-12">
                <!-- Left - Enhanced Simulasi Tabungan -->
                <div class="mobile-card p-8 shadow-2xl card-hover">
                    <h4 class="font-bold text-2xl mb-6 text-[#875937] flex items-center gap-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        Simulasi Tabungan sampai Idul Adha 2026
                    </h4>
                    <h5 class="text-lg text-gray-600 mb-6 bg-[#f5eedd] border-2 border-[#875937] px-4 py-2 rounded-lg inline-flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Target: {{ $targetDate->format('Y-m-d') }}
                    </h5>
                    
                    <!-- Period Selection -->
                    <div class="mb-8">
                        <h5 class="font-semibold mb-4 text-gray-700 text-lg flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0h2m-2 0v4m6-6V7a2 2 0 00-2-2H9m6 6a2 2 0 012 2v2a2 2 0 01-2 2h-2m0 0H9"></path>
                            </svg>
                            Pilih periode tabungan:
                        </h5>
                        <div class="space-y-4" id="periodOptions">
                            <!-- Weekly Option -->
                            <div class="period-option p-6 rounded-2xl border-2 border-gray-200 cursor-pointer bg-gradient-to-r from-gray-50 to-gray-100" 
                                 data-period="weekly" 
                                 data-amount="{{ ceil($weeklyAmount/1000)*1000 }}"
                                 data-duration="{{ $weeksRemaining }} minggu">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-[#f5eedd] border-2 border-[#875937] rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800 text-lg">Tabungan Mingguan</p>
                                            <p class="text-gray-600">{{ $weeksRemaining }} minggu (sampai {{ $targetDate->format('d M Y') }})</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-2xl text-[#875937]">Rp {{ number_format(ceil($weeklyAmount/1000)*1000, 0, ',', '.') }}</p>
                                        <p class="text-sm text-gray-500">per minggu</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Monthly Option -->
                            <div class="period-option p-6 rounded-2xl border-2 border-gray-200 cursor-pointer bg-gradient-to-r from-gray-50 to-gray-100" 
                                 data-period="monthly" 
                                 data-amount="{{ ceil($monthlyAmount/10000)*10000 }}"
                                 data-duration="{{ $monthsRemaining }} bulan">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-[#f5eedd] border-2 border-[#875937] rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800 text-lg">Tabungan Bulanan</p>
                                            <p class="text-gray-600">{{ $monthsRemaining }} bulan (sampai {{ $targetDate->format('d M Y') }})</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-2xl text-[#875937]">Rp {{ number_format(ceil($monthlyAmount/10000)*10000, 0, ',', '.') }}</p>
                                        <p class="text-sm text-gray-500">per bulan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Results Section -->
                    <div id="resultsSection" class="hidden">
                        <div class="savings-card bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 rounded-2xl p-8 border-l-8 border-blue-500 shadow-xl mb-6">
                            <h5 class="font-bold text-blue-700 text-xl mb-3 flex items-center gap-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                <span id="savingLabel">Hasil Simulasi</span>
                            </h5>
                            <div class="space-y-3 mb-4">
                                <div class="flex justify-between">
                                    <span class="text-blue-600">Total Periode:</span>
                                    <span class="font-semibold text-blue-800" id="totalPeriod"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-blue-600">Sisa Hari:</span>
                                    <span class="font-semibold text-blue-800">{{ $weeksRemaining * 7 }} hari</span>
                                </div>
                            </div>
                            <div class="text-center border-t border-blue-300 pt-4">
                                <p class="text-blue-700 mb-2">Nominal yang harus ditabung:</p>
                                <p class="font-bold text-5xl text-blue-800 shimmer" id="savingAmount">Rp 0</p>
                                <p class="text-sm text-blue-600 mt-1" id="periodText">per periode</p>
                            </div>
                        </div>
                        
                        <div class="p-6 bg-gradient-to-r from-[#f5eedd] to-[#f0e2cd] rounded-2xl border-2 border-[#d4a574] shadow-lg">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-[#875937] mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-[#6d4228] font-medium">
                                        <strong>Catatan:</strong> Nominal sudah dibulatkan untuk kemudahan pembayaran
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right - Enhanced Form -->
                <div class="mobile-card p-8 shadow-2xl card-hover">
                    <h4 class="font-bold text-2xl mb-6 text-[#875937] flex items-center gap-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Informasi Pemesanan
                    </h4>
                    
                    <form action="{{ route('savings.store') }}" method="POST" id="savingForm">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <input type="hidden" name="payment_method" value="gateway">
                        <input type="hidden" name="saving_method" id="selectedPeriod">
                        
                        <div class="space-y-8">
                            <!-- Delivery Location -->
                            <div id="deliverySection" style="display: none;">
                                <h5 class="font-semibold mb-4 text-gray-700 text-lg flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Tujuan pengiriman:
                                </h5>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="block group cursor-pointer">
                                        <input type="radio" name="delivery_location" value="rumah" class="sr-only peer" required>
                                        <div class="bg-gradient-to-br from-gray-100 to-gray-200 peer-checked:from-[#f5eedd] peer-checked:to-[#f0e2cd] peer-checked:border-[#875937] border-3 border-gray-200 rounded-2xl p-6 text-center transition-all duration-300 group-hover:shadow-lg group-hover:scale-105">
                                            <svg class="w-8 h-8 mx-auto mb-3 text-gray-600 peer-checked:text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            <p class="font-bold text-gray-800">Rumah</p>
                                        </div>
                                    </label>
                                    
                                    <label class="block group cursor-pointer">
                                        <input type="radio" name="delivery_location" value="masjid" class="sr-only peer" required>
                                        <div class="bg-gradient-to-br from-gray-100 to-gray-200 peer-checked:from-[#f5eedd] peer-checked:to-[#f0e2cd] peer-checked:border-[#875937] border-3 border-gray-200 rounded-2xl p-6 text-center transition-all duration-300 group-hover:shadow-lg group-hover:scale-105">
                                            <svg class="w-8 h-8 mx-auto mb-3 text-gray-600 peer-checked:text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            <p class="font-bold text-gray-800">Masjid</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Address -->
                            <div id="addressSection" style="display: none;">
                                <h5 class="font-semibold mb-4 text-gray-700 text-lg flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Alamat pengiriman:
                                </h5>
                                <textarea 
                                    name="address"
                                    placeholder="Masukkan alamat lengkap..." 
                                    class="w-full p-6 rounded-2xl border-3 border-gray-200 text-black placeholder-gray-500 focus:outline-none focus:border-[#875937] focus:ring-4 focus:ring-[#875937]/20 resize-none transition-all duration-300 shadow-lg"
                                    rows="4" required></textarea>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-4" id="actionButtons" style="display: none;">
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-[#875937] to-[#6d4228] hover:from-[#6d4228] hover:to-[#875937] text-white font-bold py-5 px-8 rounded-2xl transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 pulse-glow text-lg flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    Mulai Tabungan Sekarang
                                </button>
                                <a href="/packages" 
                                   class="block w-full bg-gradient-to-r from-gray-200 to-gray-300 hover:from-gray-300 hover:to-gray-400 text-gray-800 font-bold py-4 px-8 rounded-2xl text-center transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Kembali ke Packages
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Recommended Packages Section -->
    @if($recommendedPackages->count() > 0)
    <section class="py-16 bg-gradient-to-r from-white/10 to-white/5 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="text-black font-bold text-3xl mb-8 text-center gradient-text flex items-center justify-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
                Paket Rekomendasi Lainnya
            </h2>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 mx-auto">
                @foreach($recommendedPackages as $recommendedPackage)
                    <a href="/packages/{{ $recommendedPackage->id }}" 
                       class="block card-hover mobile-card p-6 group overflow-hidden relative">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#875937] to-[#6d4228]"></div>
                        <div class="relative">
                            <img src="{{ asset('storage/' . $recommendedPackage->image_path) }}" 
                                 alt="{{ $recommendedPackage->name }}" 
                                 class="w-full h-48 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-2 right-2 bg-[#875937] text-white px-2 py-1 rounded-full text-xs font-semibold">
                                {{ ucfirst($recommendedPackage->type) }}
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-bold text-xl text-[#1a1a1a] mb-2 group-hover:text-[#875937] transition-colors">{{ $recommendedPackage->name }}</h3>
                            <div class="flex items-center justify-between">
                                <p class="text-[#875937] font-bold text-lg">Rp {{ number_format($recommendedPackage->price, 0, ',', '.') }}</p>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-[#875937] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <script>
        let selectedPeriod = null;
        let selectedAmount = 0;
        let selectedDuration = '';

        // Period selection handler
        document.querySelectorAll('.period-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove previous selections
                document.querySelectorAll('.period-option').forEach(opt => {
                    opt.classList.remove('selected');
                    opt.style.color = '';
                });
                
                // Select current option
                this.classList.add('selected');
                
                // Get data
                selectedPeriod = this.dataset.period;
                selectedAmount = parseInt(this.dataset.amount);
                selectedDuration = this.dataset.duration;
                
                // Update hidden input
                document.getElementById('selectedPeriod').value = selectedPeriod;
                
                // Show results
                showResults();
                
                // Show form sections with animation
                setTimeout(() => {
                    const deliverySection = document.getElementById('deliverySection');
                    const addressSection = document.getElementById('addressSection');
                    const actionButtons = document.getElementById('actionButtons');
                    
                    deliverySection.style.display = 'block';
                    deliverySection.style.animation = 'slideInUp 0.6s ease-out';
                    
                    setTimeout(() => {
                        addressSection.style.display = 'block';
                        addressSection.style.animation = 'slideInUp 0.6s ease-out';
                    }, 200);
                    
                    setTimeout(() => {
                        actionButtons.style.display = 'block';
                        actionButtons.style.animation = 'slideInUp 0.6s ease-out';
                    }, 400);
                }, 300);
            });
        });

        function showResults() {
            const resultsSection = document.getElementById('resultsSection');
            const totalPeriod = document.getElementById('totalPeriod');
            const savingLabel = document.getElementById('savingLabel');
            const savingAmount = document.getElementById('savingAmount');
            const periodText = document.getElementById('periodText');
            
            // Update content
            totalPeriod.textContent = selectedDuration;
            savingLabel.textContent = `Tabungan ${selectedPeriod === 'weekly' ? 'Mingguan' : 'Bulanan'}`;
            savingAmount.textContent = `Rp ${selectedAmount.toLocaleString('id-ID')}`;
            periodText.textContent = `per ${selectedPeriod === 'weekly' ? 'minggu' : 'bulan'}`;
            
            // Show results with animation
            resultsSection.classList.remove('hidden');
            resultsSection.style.animation = 'slideInUp 0.6s ease-out';
        }

        // Auto-resize textarea
        const textarea = document.querySelector('textarea');
        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        }

        // Form submission
        document.getElementById('savingForm').addEventListener('submit', function(e) {
            if (!selectedPeriod) {
                e.preventDefault();
                alert('Silakan pilih periode tabungan terlebih dahulu');
                return;
            }
            
            // Add loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;
            submitBtn.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Memproses...';
            submitBtn.disabled = true;
            
            // Re-enable button after some time (in case of error)
            setTimeout(() => {
                submitBtn.innerHTML = originalContent;
                submitBtn.disabled = false;
            }, 10000);
        });

        // Add scroll animations
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

        // Observe all cards
        document.querySelectorAll('.card-hover, .mobile-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(card);
        });

        // Enhanced hover effects for period options
        document.querySelectorAll('.period-option').forEach(option => {
            option.addEventListener('mouseenter', function() {
                if (!this.classList.contains('selected')) {
                    this.style.borderColor = '#875937';
                    this.style.backgroundColor = 'rgba(135, 89, 55, 0.05)';
                }
            });
            
            option.addEventListener('mouseleave', function() {
                if (!this.classList.contains('selected')) {
                    this.style.borderColor = '#d1d5db';
                    this.style.backgroundColor = '';
                }
            });
        });
    </script>
</body>
</html>