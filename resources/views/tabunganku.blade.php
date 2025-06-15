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
</head>

<body class="text-black" style="background-color: #FFE7D0;">
    <header class="relative w-full h-screen bg-cover bg-opacity-25 bg-center" 
        style="background-image: url('{{ asset('storage/images/bg-tabunganku.jpg') }}');">
        <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.4),#FFE7D0);"></div>
        
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
    </header>

    <!-- Main Content -->
    <main class="max-w-screen mx-auto px-10 py-10">
        <!-- Welcome Message (Dynamic from auth user) -->
        <p class="text-lg mb-4">
            Assalamualaikum <em class="font-semibold italic">{{ auth()->user()->full_name ?? auth()->user()->username }}</em>,<br />
            sudahkah kamu menabung hari ini?
        </p>

        @if(isset($currentSaving) && $currentSaving)
        <!-- Active Saving Display -->
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <!-- Package Info (Dynamic) - FIXED IMAGE SIZE -->
            <div class="flex flex-col items-center">
                <h2 class="text-xl font-semibold mb-2">{{ $currentSaving->package->name }}</h2>
                <div class=" w-[640px] h-96 mb-4 rounded-lg">
                    <img src="{{ asset('storage/' . $currentSaving->package->image_path) }}" 
                         alt="{{ $currentSaving->package->name }}" 
                         class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <h3 class="bg-white px-3 w-[640px] font-bold flex justify-center text-xl">
                    Rp {{ number_format($currentSaving->package->price, 0, ',', '.') }}
                </h3>
                <p class="text-sm text-center mt-2 max-w-md">
                    {{ $currentSaving->package->description ?? 'Paket berkualitas untuk qurban Anda.' }}
                </p>
            </div>
            <!-- Progress Tabungan (Dynamic) -->
            <div>
                <h2 class="font-semibold text-xl">Progress Tabungan</h2>
                <p class="mb-4">
                    Rp {{ number_format($currentSaving->amount_saved, 0, ',', '.') }} / 
                    Rp {{ number_format($currentSaving->package->price, 0, ',', '.') }}
                </p>

                <!-- Progress Bar -->
                <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                    <div class="bg-[#875937] h-2 rounded-full" 
                         style="width: {{ ($currentSaving->amount_saved / $currentSaving->package->price) * 100 }}%"></div>
                </div>

                <!-- FIXED PROGRESS BOXES -->
                <div class="mb-6">
                    @if($currentSaving->saving_type === 'weekly')
                        <!-- Weekly Progress (Always show 10 boxes per row) -->
                        @php
                            $totalRows = ceil($currentSaving->total_periods / 10);
                            $currentGroup = isset($_GET['group']) ? (int)$_GET['group'] : 0;
                            $currentGroup = max(0, min($currentGroup, $totalRows - 1));
                            $startPeriod = $currentGroup * 10;
                            $endPeriod = min($startPeriod + 10, $currentSaving->total_periods);
                        @endphp
                        
                        <div class="grid grid-cols-10 gap-2 mb-4">
                            @for($i = $startPeriod; $i < $endPeriod; $i++)
                                <div class="h-16 rounded p-2 text-center flex flex-col justify-center text-xs
                                    {{ $i < $currentSaving->completed_periods ? 'bg-green-400' : 'bg-[#DFA682]' }}">
                                    <span class="font-semibold">W{{ $i + 1 }}</span>
                                    @if($i < $currentSaving->completed_periods)
                                        <span class="text-xs">✓</span>
                                    @else
                                        <span class="text-xs">-</span>
                                    @endif
                                </div>
                            @endfor
                        </div>
                        
                        <!-- Navigation for weekly groups -->
                        @if($totalRows > 1)
                            <div class="flex justify-center gap-2 mb-4 flex-wrap">
                                @for($group = 0; $group < $totalRows; $group++)
                                    @php
                                        $groupStart = $group * 10 + 1;
                                        $groupEnd = min(($group + 1) * 10, $currentSaving->total_periods);
                                    @endphp
                                    <a href="/tabunganku?group={{ $group }}" 
                                       class="px-3 py-1 rounded text-sm {{ $group === $currentGroup ? 'bg-[#875937] text-white' : 'bg-gray-300 hover:bg-gray-400' }}">
                                        {{ $groupStart }}-{{ $groupEnd }}
                                    </a>
                                @endfor
                            </div>
                        @endif
                    @else
                        <!-- Monthly Progress (Show all months in grid) -->
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
                                    @endphp
                                    <div class="h-20 rounded p-3 text-center flex flex-col justify-center
                                        {{ $i < $currentSaving->completed_periods ? 'bg-green-400' : 'bg-[#DFA682]' }}">
                                        <span class="font-semibold text-sm">{{ $monthDate->format('M') }}</span>
                                        <span class="text-xs">{{ $monthDate->format('Y') }}</span>
                                        @if($i < $currentSaving->completed_periods)
                                            <span class="text-xs">✓</span>
                                        @else
                                            <span class="text-xs">-</span>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        @endfor
                    @endif
                </div>

                <!-- Next Payment Info -->
                @if($currentSaving->completed_periods < $currentSaving->total_periods)
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-blue-800">Pembayaran Berikutnya:</h4>
                        <p class="text-blue-700">
                            Rp {{ number_format($currentSaving->amount_per_period, 0, ',', '.') }}
                            ({{ $currentSaving->saving_type === 'weekly' ? 'Mingguan' : 'Bulanan' }})
                        </p>
                        <button onclick="makePayment({{ $currentSaving->id }})" 
                                class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            💰 Bayar Sekarang
                        </button>
                    </div>
                @else
                    <div class="bg-green-50 p-4 rounded-lg">
                        <h4 class="font-semibold text-green-800">🎉 Tabungan Selesai!</h4>
                        <p class="text-green-700">Selamat! Anda telah menyelesaikan tabungan qurban.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- FIXED INFO TABUNGAN SECTION -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6">
            <!-- Left Column - Info Display -->
            <div class="pt-2 text-black">
                <h1 class="text-lg font-semibold pb-2">Info Tabunganku</h1>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold rounded-xl bg-white/60 px-2 py-1">Metode Pembayaran:</h2>
                    <h3 class="text-lg font-semibold pl-2 py-1">Payment Gateway (Otomatis)</h3>
                </div>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold rounded-xl bg-white/60 px-2 py-1">Tujuan Pengiriman:</h2>
                    <h3 class="text-lg font-semibold pl-2 py-1">{{ $currentSaving->delivery_location }}</h3>
                </div>
                <div class="mb-4">
                    <h2 class="text-xl font-semibold rounded-xl bg-white/60 px-2 py-1">Alamat:</h2>
                    <!-- FIXED: Alamat bisa panjang dan turun ke bawah -->
                    <div class="pl-2 py-1">
                        <p class="text-lg font-semibold break-words leading-relaxed">{{ $currentSaving->delivery_address }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Update Form -->
            <div class="pt-2">
                <h1 class="text-lg font-semibold pb-2">Update Informasi</h1>
                
                <form action="{{ route('tabungan.update', $currentSaving->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold">Pilih tujuan pengiriman:</h4>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <input type="radio" id="rumah" name="delivery_location" value="Rumah" 
                                       class="hidden peer" {{ $currentSaving->delivery_location === 'Rumah' ? 'checked' : '' }}>
                                <label for="rumah" class="bg-[#875937]/30 hover:bg-[#875937]/50 rounded-xl w-full h-[50px] flex items-center justify-center cursor-pointer peer-checked:bg-[#875937]/80 peer-checked:text-white">🏠 Rumah</label>
                            </div>
                            <div>
                                <input type="radio" id="masjid" name="delivery_location" value="Masjid" 
                                       class="hidden peer" {{ $currentSaving->delivery_location === 'Masjid' ? 'checked' : '' }}>
                                <label for="masjid" class="bg-[#875937]/30 hover:bg-[#875937]/50 rounded-xl w-full h-[50px] flex items-center justify-center cursor-pointer peer-checked:bg-[#875937]/80 peer-checked:text-white">🕌 Masjid</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-lg">Masukkan alamat:</h4>
                        <textarea name="delivery_address"
                                  placeholder="Jl. Karang Empat XII no.26 Surabaya, Jawa Timur, Indonesia" 
                                  class="bg-[#875937]/30 rounded-xl min-h-[120px] w-full p-3 text-left resize-y placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#875937]"
                                  required>{{ $currentSaving->delivery_address }}</textarea>
                    </div>
                    
                    <div class="flex flex-col justify-center items-center gap-2 py-4">
                        <button type="submit" class="bg-[#875937] rounded-xl hover:bg-[#875937]/80 w-full h-[50px] text-white font-semibold">
                            📝 Update Informasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @else
        <!-- No Active Saving -->
        <div class="text-center py-12">
            <h2 class="text-2xl font-semibold mb-4">Belum Ada Tabungan Aktif</h2>
            <p class="text-gray-600 mb-6">Anda belum memiliki tabungan qurban yang aktif.</p>
            <a href="/packages" class="bg-[#875937] text-white px-6 py-3 rounded-lg hover:bg-[#875937]/90">
                🐄 Pilih Paket Qurban
            </a>
        </div>
        @endif

        <!-- Recommended Package -->
        @if(isset($recommendedPackages) && $recommendedPackages->count() > 0)
        <section class="py-8">
            <div class="mx-auto px-9 py-4">
                <h1 class="text-black font-semibold text-xl mb-4">Paket Rekomendasi Lainnya</h1>
                <div class="grid gap-6 py-3 sm:grid-cols-2 md:grid-cols-3 mx-auto">
                    @foreach($recommendedPackages as $package)
                        <a href="/packages/{{ $package->id }}" class="block bg-[#f5eedd] p-4 h-[420px] rounded-lg shadow-lg text-left hover:bg-[#f2e6cc] hover:scale-105 transition-shadow duration-300">
                            <img src="{{ asset('storage/' . $package->image_path) }}" alt="{{ $package->name }}" class="rounded-sm w-full h-[320px] object-cover mb-4">
                            <div class="mt-2 flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold text-[#1a1a1a]">{{ $package->name }}</h3>
                                    <p class="text-orange-600 mb-2">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </main>

    <script>
        function makePayment(savingId) {
            if (confirm('Apakah Anda yakin ingin melakukan pembayaran?')) {
                // FIXED: Prevent infinite loop - redirect to proper payment route
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
                        alert('Pembayaran berhasil!');
                        location.reload();
                    } else {
                        alert('Pembayaran gagal: ' + (data.message || 'Terjadi kesalahan'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memproses pembayaran');
                });
            }
        }

        // Auto-resize textarea
        document.querySelector('textarea')?.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
</body>
</html>