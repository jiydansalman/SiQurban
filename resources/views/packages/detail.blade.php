<!DOCTYPE html>
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
</head>
<body class="text-white" style="background-color: #FFE7D0;">
    <nav class="fixed h-24 top-0 left-0 w-full bg-[#875937]/70 text-white py-4 px-8 flex justify-center items-center space-x-6 z-50">
        <a href="/home" style="font-family: 'Actor', sans-serif;" class="relative inline-block after:block after:h-[2px] after:w-full after:bg-black after:scale-x-0 hover:after:scale-x-100 transition-all">Home</a>
        <a href="/packages" style="font-family: 'Actor', sans-serif;" class="hover:underline">Packages</a>
        <a href="/tabunganku" style="font-family: 'Actor', sans-serif;" class="hover:underline ">Tabunganku</a>
        <a href="/profile/edit" style="font-family: 'Afacad', sans-serif;" class="font-bold hover:underline">Profile</a>
    </nav>

    <!-- Package Detail Section -->
    <section class="pt-24 px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Info Paket -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Left Side - Image -->
                <div class="py-4">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $package->image_path) }}" 
                             class="w-full h-96 object-cover rounded-lg shadow-lg" 
                             alt="{{ $package->name }}">
                        <div class="absolute top-4 left-4 bg-[#875937] text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ ucfirst($package->type) }}
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Basic Info -->
                <div class="flex flex-col py-3 text-black gap-4">
                    <h1 class="font-bold text-6xl md:text-8xl">{{ $package->name }}</h1>
                    <h2 class="font-semibold text-2xl capitalize text-orange-600">{{ $package->type }}</h2>
                    <h3 class="font-semibold text-3xl text-[#875937]">Rp {{ number_format($package->price, 0, ',', '.') }}</h3>
                    
                    <!-- Description -->
                    <div class="bg-white/70 rounded-xl p-6">
                        <h4 class="font-bold text-xl mb-3 text-[#875937]">Deskripsi Paket</h4>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $package->description ?? 'Paket ' . $package->type . ' berkualitas tinggi untuk qurban Anda. Hewan sehat dan terjamin kualitasnya sesuai syariat Islam.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Simulasi & Form Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Left - Simulasi Tabungan -->
                <div class="bg-white/80 rounded-xl p-6 shadow-lg">
                    <h4 class="font-bold text-xl mb-4 text-[#875937]">💰 Simulasi Tabungan sampai Idul Adha 2026</h4>
                    <h5 class="text-md text-gray-600 mb-4">Target: {{ $targetDate->format('Y-m-d') }}</h5>
                    
                    <div class="space-y-4 mt-5">
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-6 border-l-4 border-blue-500">
                            <h5 class="font-bold text-blue-700 text-lg mb-2">Tabungan Mingguan</h5>
                            <p class="text-gray-600 font-bold mb-3">{{ $weeksRemaining }} minggu tersisa</p>
                            <p class="text-gray-700 mb-2">Nominal yang harus ditabung:</p>
                            <p class="font-bold text-7xl text-center text-blue-700">Rp {{ number_format(ceil($weeklyAmount/1000)*1000, 0, ',', '.') }}</p>
                            <p class="text-sm text-right text-gray-500 mt-1">per minggu</p>
                        </div>
                        
                        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-lg p-6 border-l-4 border-green-500">
                            <h5 class="font-bold text-green-700 text-lg mb-2">Tabungan Bulanan</h5>
                            <p class="text-gray-600 font-bold mb-3">{{ $monthsRemaining }} bulan tersisa</p>
                            <p class="text-gray-700 mb-2">Nominal yang harus ditabung:</p>
                            <p class="font-bold text-7xl text-center text-green-700">Rp {{ number_format(ceil($monthlyAmount/10000)*10000, 0, ',', '.') }}</p>
                            <p class="text-sm text-right text-gray-500 mt-1">per bulan</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-amber-50 rounded-lg border border-amber-200">
                        <p class="text-sm text-amber-800">
                            <strong>Catatan:</strong> Nominal sudah dibulatkan untuk kemudahan pembayaran
                        </p>
                    </div>
                </div>

                <!-- Right - Form Informasi Pemesanan -->
                <div class="bg-white/80 rounded-xl p-6 shadow-lg">
                    <h4 class="font-bold text-xl mb-4 text-[#875937]">📝 Informasi Pemesanan</h4>
                    
                    <!-- FORM YANG BENAR -->
                    <form action="{{ route('savings.store') }}" method="POST" id="savingForm">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <input type="hidden" name="payment_method" value="gateway">
                        
                        <!-- Pilih Periode Tabungan -->
                        <div class="mb-6">
                            <h5 class="font-semibold mb-3 text-gray-700">Pilih periode tabungan:</h5>
                            <div class="space-y-3">
                                <label class="block">
                                    <input type="radio" name="saving_method" value="weekly" class="sr-only peer" required>
                                    <div class="bg-gray-50 peer-checked:bg-blue-50 peer-checked:border-blue-400 border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:bg-gray-100 transition-all">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="font-semibold text-gray-800">Mingguan</p>
                                                <p class="text-sm text-gray-600">Bayar setiap minggu</p>
                                            </div>
                                            <p class="font-bold text-lg text-blue-600">Rp {{ number_format(ceil($weeklyAmount/1000)*1000, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </label>
                                
                                <label class="block">
                                    <input type="radio" name="saving_method" value="monthly" class="sr-only peer" required>
                                    <div class="bg-gray-50 peer-checked:bg-green-50 peer-checked:border-green-400 border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:bg-gray-100 transition-all">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="font-semibold text-gray-800">Bulanan</p>
                                                <p class="text-sm text-gray-600">Bayar setiap bulan</p>
                                            </div>
                                            <p class="font-bold text-lg text-green-600">Rp {{ number_format(ceil($monthlyAmount/10000)*10000, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Pilih Lokasi Pengiriman -->
                        <div class="mb-6">
                            <h5 class="font-semibold mb-3 text-gray-700">Tujuan pengiriman:</h5>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="block">
                                    <input type="radio" name="delivery_location" value="rumah" class="sr-only peer" required>
                                    <div class="bg-gray-100 peer-checked:bg-orange-100 peer-checked:border-orange-500 border-2 border-gray-200 rounded-lg p-4 text-center cursor-pointer hover:bg-gray-50 transition-all">
                                        <p class="text-2xl mb-1">🏠</p>
                                        <p class="font-semibold text-gray-800">Rumah</p>
                                    </div>
                                </label>
                                
                                <label class="block">
                                    <input type="radio" name="delivery_location" value="masjid" class="sr-only peer" required>
                                    <div class="bg-gray-100 peer-checked:bg-purple-100 peer-checked:border-purple-500 border-2 border-gray-200 rounded-lg p-4 text-center cursor-pointer hover:bg-gray-50 transition-all">
                                        <p class="text-2xl mb-1">🕌</p>
                                        <p class="font-semibold text-gray-800">Masjid</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-6">
                            <h5 class="font-semibold mb-3 text-gray-700">Alamat pengiriman:</h5>
                            <textarea 
                                name="address"
                                placeholder="Masukkan alamat lengkap..." 
                                class="w-full p-4 rounded-lg border-2 border-gray-200 text-black placeholder-gray-500 focus:outline-none focus:border-[#875937] resize-none transition-colors"
                                rows="4" required></textarea>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button type="submit" 
                                    class="w-full bg-[#875937] hover:bg-[#875937]/90 text-white font-semibold py-4 px-6 rounded-lg transition-all shadow-lg">
                                🐄 Mulai Tabungan Sekarang
                            </button>
                            <a href="/packages" 
                               class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg text-center transition-all">
                                ← Kembali ke Packages
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Recommended Packages Section -->
    @if($recommendedPackages->count() > 0)
    <section class="py-10">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="text-black font-semibold text-2xl mb-6">Paket Rekomendasi Lainnya</h2>
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 mx-auto">
                @foreach($recommendedPackages as $recommendedPackage)
                    <a href="/packages/{{ $recommendedPackage->id }}" 
                       class="block bg-[#f5eedd] p-4 rounded-lg shadow-lg text-left hover:bg-[#f2e6cc] hover:scale-105 transition-all duration-300">
                        <img src="{{ asset('storage/' . $recommendedPackage->image_path) }}" 
                             alt="{{ $recommendedPackage->name }}" 
                             class="rounded-sm w-full h-48 object-cover mb-4">
                        <div class="mt-2">
                            <h3 class="font-bold text-[#1a1a1a]">{{ $recommendedPackage->name }}</h3>
                            <p class="text-orange-600 mb-2">Rp {{ number_format($recommendedPackage->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <script>
        // Auto-resize textarea
        document.querySelector('textarea').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Form validation bawaan HTML5 sudah cukup
        document.getElementById('savingForm').addEventListener('submit', function(e) {
            // Bisa tambahkan validasi custom jika perlu
            console.log('Form sedang disubmit...');
        });
    </script>
</body>
</html>