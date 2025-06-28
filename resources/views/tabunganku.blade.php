<!DOCTYPE html>
<html id="tabunganku" lang="en">
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
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
        
        @keyframes progressFill {
            from { width: 0%; }
            to { width: var(--progress-width); }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .slide-in-up {
            animation: slideInUp 0.6s ease-out;
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        .progress-animate {
            animation: progressFill 2s ease-out;
        }
        
        .pulse-animate {
            animation: pulse 2s infinite;
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
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 15px 35px rgba(135, 89, 55, 0.15);
        }
        
        .mobile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #875937, #d4a574);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .period-box {
            transition: all 0.3s ease;
        }
        
        .period-box:hover {
            transform: scale(1.05);
        }
        
        .period-box.completed {
            background: linear-gradient(135deg, #10b981, #059669);
            animation: pulse 2s infinite;
        }
        
        .period-box.pending {
            background: linear-gradient(135deg, #d4a574, #c4954f);
        }
    </style>
</head>

<body class="text-black overflow-x-hidden" style="background: linear-gradient(to bottom, #FFE7D0 100%, #F4D1AE 50%, #E8C5A0 100%);">
    <!-- Enhanced Header -->
    <header class="relative w-full h-screen bg-cover bg-opacity-25 bg-center" 
        style="background-image: url('{{ asset('images/bg-tabunganku.jpg') }}');">
        <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4), #FFE7D0);"></div>
        
        <!-- Enhanced Navigation Bar -->
        @include('partials.navbar')

        <!-- Enhanced Header Content -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <img src="{{ asset('images/logo_putih.png') }}" alt="Logo Siddiq Qurban" class="absolute top-6 mt-5 left-5 w-40">
            <h1 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-8xl gradient-text slide-in-up">Tabunganku</h1>
            <div class="flex items-center gap-2 mt-4 fade-in">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <h4 style="font-family: 'Abhaya Libre', sans-serif;" class="text-white text-xl">Home > Tabunganku</h4>
            </div>
        </div>
    </header>

    <!-- Enhanced Main Content -->
    <main class="max-w-screen mx-auto px-10 py-10">
        <!-- Enhanced Welcome Message -->
        <div class="mobile-card p-6 mb-8 slide-in-up">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                <span class="text-[#875937] font-semibold">Selamat Datang</span>
            </div>
            <p class="text-lg">
                Assalamualaikum <em class="font-semibold italic text-[#875937]">{{ auth()->user()->full_name ?? auth()->user()->username }}</em>,<br />
                sudahkah kamu menabung hari ini?
            </p>
        </div>

        @if(isset($currentSaving) && $currentSaving)
        <!-- Enhanced Active Saving Display -->
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <!-- Enhanced Package Info -->
            <div class="mobile-card p-6 slide-in-up">
                <div class="text-center">
                    <div class="flex items-center justify-center gap-2 mb-4">
                        <svg class="w-6 h-6 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <h2 class="text-2xl font-bold text-[#875937]">{{ $currentSaving->package->name }}</h2>
                    </div>
                    
                    <div class="relative mb-6 group">
                        <div class="w-full max-w-lg mx-auto h-80 rounded-2xl overflow-hidden shadow-xl">
                            <img src="{{ asset('storage/' . $currentSaving->package->image_path) }}" 
                                 alt="{{ $currentSaving->package->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="absolute top-4 right-4 bg-[#875937] text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ strtoupper($currentSaving->package->type ?? 'Paket') }}
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-[#d4a574] to-[#c4954f] px-6 py-4 rounded-xl inline-block mb-4">
                        <h3 class="font-bold text-2xl text-[#875937]">
                            Rp {{ number_format($currentSaving->package->price, 0, ',', '.') }}
                        </h3>
                    </div>
                    
                    <p class="text-gray-600 leading-relaxed max-w-md mx-auto">
                        {{ $currentSaving->package->description ?? 'Paket berkualitas untuk qurban Anda.' }}
                    </p>
                </div>
            </div>

            <!-- Enhanced Progress Section -->
            <div class="mobile-card p-6 slide-in-up">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-7 h-7 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <h2 class="font-bold text-2xl text-[#875937]">Progress Tabungan</h2>
                </div>

                <!-- Enhanced Progress Info -->
                <div class="mb-6 p-4 bg-gradient-to-r from-[#f5eedd] to-[#f0e2cd] rounded-xl">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-[#6d4228] font-medium">Terkumpul:</span>
                        <span class="font-bold text-[#875937]">Rp {{ number_format($currentSaving->amount_saved, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#6d4228] font-medium">Target:</span>
                        <span class="font-bold text-[#875937]">Rp {{ number_format($currentSaving->package->price, 0, ',', '.') }}</span>
                    </div>

                    <!-- Enhanced Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-4 mb-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-[#875937] to-[#6d4228] h-4 rounded-full progress-animate transition-all duration-1000" 
                             style="width: {{ ($currentSaving->amount_saved / $currentSaving->package->price) * 100 }}%"></div>
                    </div>
                    <div class="text-right text-sm text-[#6d4228]">
                        {{ number_format(($currentSaving->amount_saved / $currentSaving->package->price) * 100, 1) }}% completed
                    </div>
                </div>

                <!-- Enhanced Progress Boxes -->
                <div class="mb-6">
                    @if($currentSaving->saving_type === 'weekly')
                        @php
                            $totalRows = ceil($currentSaving->total_periods / 10);
                            $currentGroup = isset($_GET['group']) ? (int)$_GET['group'] : 0;
                            $currentGroup = max(0, min($currentGroup, $totalRows - 1));
                            $startPeriod = $currentGroup * 10;
                            $endPeriod = min($startPeriod + 10, $currentSaving->total_periods);
                        @endphp
                        
                        <div class="grid grid-cols-5 gap-2 mb-4">
                            @for($i = $startPeriod; $i < min($startPeriod + 5, $endPeriod); $i++)
                                <div class="period-box h-16 rounded-xl p-2 text-center flex flex-col justify-center text-xs shadow-lg
                                    {{ $i < $currentSaving->completed_periods ? 'completed text-white' : 'pending text-[#875937]' }}">
                                    <span class="font-bold">{{ $i + 1 }}</span>
                                    @if($i < $currentSaving->completed_periods)
                                        <svg class="w-4 h-4 mx-auto mt-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <span class="text-xs">Minggu {{ $i + 1 }}</span>
                                    @endif
                                </div>
                            @endfor
                        </div>
                        <div class="grid grid-cols-5 gap-2 mb-4">
                            @for($i = min($startPeriod + 5, $endPeriod); $i < $endPeriod; $i++)
                                <div class="period-box h-16 rounded-xl p-2 text-center flex flex-col justify-center text-xs shadow-lg
                                    {{ $i < $currentSaving->completed_periods ? 'completed text-white' : 'pending text-[#875937]' }}">
                                    <span class="font-bold">{{ $i + 1 }}</span>
                                    @if($i < $currentSaving->completed_periods)
                                        <svg class="w-4 h-4 mx-auto mt-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <span class="text-xs">Minggu {{ $i + 1 }}</span>
                                    @endif
                                </div>
                            @endfor
                        </div>

                        
                        <!-- Enhanced Navigation for weekly groups -->
                        @if($totalRows > 1)
                            <div class="flex justify-center gap-2 mb-4 flex-wrap">
                                @for($group = 0; $group < $totalRows; $group++)
                                    @php
                                        $groupStart = $group * 10 + 1;
                                        $groupEnd = min(($group + 1) * 10, $currentSaving->total_periods);
                                    @endphp
                                    <a href="/tabunganku?group={{ $group }}" 
                                       class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 {{ $group === $currentGroup ? 'bg-[#875937] text-white shadow-lg' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                                        {{ $groupStart }}-{{ $groupEnd }}
                                    </a>
                                @endfor
                            </div>
                        @endif
                    @else
                        <!-- Enhanced Monthly Progress -->
                        @php
                            $monthsPerRow = min(6, $currentSaving->total_periods);
                            $totalRows = ceil($currentSaving->total_periods / $monthsPerRow);
                        @endphp
                        
                        @for($row = 0; $row < $totalRows; $row++)
                            <div class="grid grid-cols-{{ $monthsPerRow }} gap-3 mb-4">
                                @php
                                    $startMonth = $row * $monthsPerRow;
                                    $endMonth = min($startMonth + $monthsPerRow, $currentSaving->total_periods);
                                @endphp
                                
                                @for($i = $startMonth; $i < $endMonth; $i++)
                                    @php
                                        $monthDate = \Carbon\Carbon::now()->addMonths($i);
                                        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                                    @endphp
                                    <div class="period-box h-20 rounded-xl p-3 text-center flex flex-col justify-center shadow-lg
                                        {{ $i < $currentSaving->completed_periods ? 'completed text-white' : 'pending text-[#875937]' }}">
                                        <span class="font-bold text-sm">{{ $monthNames[$monthDate->month - 1] }}</span>
                                        <span class="text-xs">{{ $monthDate->format('Y') }}</span>
                                        @if($i < $currentSaving->completed_periods)
                                            <svg class="w-4 h-4 mx-auto mt-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        @endfor
                    @endif
                </div>

                <!-- Enhanced Payment Info -->
                @if($currentSaving->completed_periods < $currentSaving->total_periods)
                    <div class="bg-gradient-to-r from-[#f5eedd] to-[#f0e2cd] p-6 rounded-2xl border-l-4 border-[#875937] shadow-lg">
                        <div class="flex items-center gap-3 mb-3">
                            <svg class="w-6 h-6 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            <h4 class="font-bold text-[#6d4228] text-lg">Pembayaran Berikutnya:</h4>
                        </div>
                        <p class="text-[#875937] mb-4 text-lg">
                            Rp {{ number_format(ceil($currentSaving->amount_per_period / 1000) * 1000, 0, ',', '.') }}
                            ({{ $currentSaving->saving_type === 'weekly' ? 'Mingguan' : 'Bulanan' }})
                        </p>
                        <button onclick="makePayment({{ $currentSaving->id }})" 
                                class="w-full bg-gradient-to-r from-[#875937] to-[#6d4228] text-white px-6 py-3 rounded-xl hover:from-[#6d4228] hover:to-[#875937]   transition-all duration-300 transform hover:scale-105 font-semibold flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            Bayar Sekarang
                        </button>
                    </div>
                @else
                    <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-2xl border-l-4 border-green-500 shadow-lg">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h4 class="font-bold text-green-800 text-xl">🎉 Tabungan Selesai!</h4>
                        </div>
                        <p class="text-green-700 text-lg">Selamat! Anda telah menyelesaikan tabungan qurban.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Enhanced Info Section (Simplified) -->
        <div class="mobile-card p-8 mb-8 slide-in-up">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-7 h-7 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="text-2xl font-bold text-[#875937]">Info Tabunganku</h1>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Payment Method -->
                <div class="bg-gradient-to-r from-[#f5eedd] to-[#f0e2cd] p-4 rounded-xl">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-5 h-5 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <h2 class="text-lg font-bold text-[#875937]">Metode:</h2>
                    </div>
                    <p class="text-[#6d4228] font-semibold ml-8">Payment Gateway</p>
                </div>

                <!-- Delivery Location -->
                <div class="bg-gradient-to-r from-[#f5eedd] to-[#f0e2cd] p-4 rounded-xl">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-5 h-5 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        </svg>
                        <h2 class="text-lg font-bold text-[#875937]">Tujuan:</h2>
                    </div>
                    <p class="text-[#6d4228] font-semibold ml-8 capitalize">{{ $currentSaving->delivery_location }}</p>
                </div>

                <!-- Update Button -->
                <div class="flex items-center justify-center">
                    <button onclick="toggleUpdateForm()" class="w-full bg-gradient-to-r from-[#875937] to-[#6d4228] hover:from-[#6d4228] hover:to-[#875937] text-white font-bold py-3 px-6 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Update Info
                    </button>
                </div>
            </div>

            <!-- Address Display -->
            <div class="mt-6 bg-gradient-to-r from-[#f5eedd] to-[#f0e2cd] p-4 rounded-xl">
                <div class="flex items-start gap-3 mb-2">
                    <svg class="w-5 h-5 text-[#875937] mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold text-[#875937] mb-2">Alamat Pengiriman:</h2>
                        <p class="text-[#6d4228] font-semibold break-words leading-relaxed">{{ $currentSaving->delivery_address }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden Update Form (Modal Style) -->
        <div id="updateFormModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
            <div class="mobile-card p-8 max-w-lg w-full max-h-[80vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <svg class="w-7 h-7 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <h1 class="text-2xl font-bold text-[#875937]">Update Informasi</h1>
                    </div>
                    <button onclick="toggleUpdateForm()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form action="{{ route('tabungan.update', $currentSaving->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Enhanced Delivery Location Selection -->
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-5 h-5 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <h4 class="text-lg font-bold text-[#875937]">Pilih tujuan pengiriman:</h4>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative">
                                <input type="radio" id="rumah" name="delivery_location" value="Rumah" 
                                       class="sr-only peer" {{ $currentSaving->delivery_location === 'Rumah' ? 'checked' : '' }}>
                                <label for="rumah" class="block bg-gradient-to-br from-gray-100 to-gray-200 peer-checked:from-[#f5eedd] peer-checked:to-[#f0e2cd] peer-checked:border-[#875937] border-2 border-gray-200 rounded-2xl p-6 text-center cursor-pointer transition-all duration-300 hover:shadow-lg hover:scale-105">
                                    <svg class="w-8 h-8 mx-auto mb-3 text-gray-600 peer-checked:text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    <span class="font-bold text-gray-800">Rumah</span>
                                </label>
                            </div>
                            <div class="relative">
                                <input type="radio" id="masjid" name="delivery_location" value="Masjid" 
                                       class="sr-only peer" {{ $currentSaving->delivery_location === 'Masjid' ? 'checked' : '' }}>
                                <label for="masjid" class="block bg-gradient-to-br from-gray-100 to-gray-200 peer-checked:from-[#f5eedd] peer-checked:to-[#f0e2cd] peer-checked:border-[#875937] border-2 border-gray-200 rounded-2xl p-6 text-center cursor-pointer transition-all duration-300 hover:shadow-lg hover:scale-105">
                                    <svg class="w-8 h-8 mx-auto mb-3 text-gray-600 peer-checked:text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="font-bold text-gray-800">Masjid</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Address Input -->
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-5 h-5 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <h4 class="font-bold text-lg text-[#875937]">Masukkan alamat:</h4>
                        </div>
                        <textarea name="delivery_address"
                                  placeholder="Masukkan alamat lengkap..." 
                                  class="w-full p-4 rounded-2xl border-2 border-gray-200 text-black placeholder-gray-500 focus:outline-none focus:border-[#875937] focus:ring-4 focus:ring-[#875937]/20 resize-y transition-all duration-300 min-h-[120px]"
                                  required>{{ $currentSaving->delivery_address }}</textarea>
                    </div>
                    
                    <!-- Enhanced Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gradient-to-r from-[#875937] to-[#6d4228] hover:from-[#6d4228] hover:to-[#875937] text-white font-bold py-4 px-6 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Update Informasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        @else
        <!-- Enhanced No Active Saving -->
        <div class="mobile-card p-12 text-center slide-in-up">
            <div class="mb-6">
                <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h2 class="text-3xl font-bold text-[#875937] mb-4">Belum Ada Tabungan Aktif</h2>
                <p class="text-gray-600 text-lg mb-8">Anda belum memiliki tabungan qurban yang aktif. Mari mulai menabung untuk qurban tahun ini!</p>
            </div>
            <a href="/packages" class="inline-flex items-center gap-3 bg-gradient-to-r from-[#875937] to-[#6d4228] text-white px-8 py-4 rounded-2xl hover:from-[#6d4228] hover:to-[#875937] transition-all duration-300 transform hover:scale-105 font-bold text-lg shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                Pilih Paket Qurban
            </a>
        </div>
        @endif

        <!-- Enhanced Recommended Packages -->
        @if(isset($recommendedPackages) && $recommendedPackages->count() > 0)
        <section class="py-8">
            <div class="mx-auto px-9 py-4">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-8 h-8 text-[#875937]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <h1 class="text-2xl font-bold text-[#875937]">Paket Rekomendasi Lainnya</h1>
                </div>
                <div class="grid gap-6 py-3 sm:grid-cols-2 lg:grid-cols-3 mx-auto">
                    @foreach($recommendedPackages as $package)
                        <a href="/packages/{{ $package->id }}" class="block mobile-card p-6 card-hover group overflow-hidden relative">
                            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#875937] to-[#6d4228]"></div>
                            <div class="relative mb-4">
                                <img src="{{ asset('storage/' . $package->image_path) }}" 
                                     alt="{{ $package->name }}" 
                                     class="rounded-xl w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 right-2 bg-[#875937] text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ ucfirst($package->type ?? 'Paket') }}
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold text-lg text-[#1a1a1a] group-hover:text-[#875937] transition-colors">{{ $package->name }}</h3>
                                    <p class="text-[#875937] font-bold text-lg">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                                </div>
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-[#875937] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </main>

    <!-- Enhanced JavaScript -->
    <script>
        // Enhanced payment function
        function makePayment(savingId) {
            // Show loading state
            const button = event.target;
            const originalContent = button.innerHTML;
            button.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Memproses...';
            button.disabled = true;
            
            if (confirm('Apakah Anda yakin ingin melakukan pembayaran?')) {
                fetch(`/tabungan/${savingId}/payment`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Success animation
                        button.innerHTML = '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> Berhasil!';
                        button.classList.add('bg-green-500');
                        
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        alert('Pembayaran gagal: ' + (data.message || 'Terjadi kesalahan'));
                        button.innerHTML = originalContent;
                        button.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memproses pembayaran');
                    button.innerHTML = originalContent;
                    button.disabled = false;
                });
            } else {
                button.innerHTML = originalContent;
                button.disabled = false;
            }
        }

        // Toggle update form modal
        function toggleUpdateForm() {
            const modal = document.getElementById('updateFormModal');
            modal.classList.toggle('hidden');
            
            // Prevent body scroll when modal is open
            if (!modal.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal when clicking outside
        document.getElementById('updateFormModal').addEventListener('click', function(e) {
            if (e.target === this) {
                toggleUpdateForm();
            }
        });

        // Enhanced auto-resize textarea
        const textarea = document.querySelector('textarea');
        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        }

        // Animate elements on scroll
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

        // Observe all cards with animations
        document.querySelectorAll('.slide-in-up, .card-hover').forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(element);
        });

        // Enhanced form interactions
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', function() {
                // Add ripple effect
                const label = this.nextElementSibling;
                if (label) {
                    label.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        label.style.transform = 'scale(1)';
                    }, 100);
                }
            });
        });

        // Add smooth scrolling for navigation links
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

        // Initialize progress bar animation
        window.addEventListener('load', function() {
            const progressBar = document.querySelector('.progress-animate');
            if (progressBar) {
                progressBar.style.setProperty('--progress-width', progressBar.style.width);
                progressBar.style.width = '0%';
                setTimeout(() => {
                    progressBar.style.width = progressBar.style.getPropertyValue('--progress-width');
                }, 500);
            }
        });
    </script>
</body>
</html>