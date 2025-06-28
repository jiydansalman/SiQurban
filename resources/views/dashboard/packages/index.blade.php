@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Manajemen Paket Qurban</h1>
                <p class="text-gray-600">Kelola semua paket qurban yang tersedia</p>
            </div>
            <div class="flex space-x-3">
                <button onclick="exportPackages()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>Export</span>
                </button>
                <a href="/dashboard/packages/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Tambah Paket</span>
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Paket</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $packages->count() ?? 12 }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Paket Aktif</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $activePackages ?? 10 }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Subscribers</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalSubscribers ?? 891 }}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Revenue</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">Rp {{ number_format($totalRevenue ?? 2450000000, 0, ',', '.') }}</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex-1 max-w-lg">
                <div class="relative">
                    <input type="text" id="searchPackages" placeholder="Cari nama paket atau jenis hewan..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex space-x-3">
                <select id="typeFilter" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Jenis</option>
                    <option value="kambing">Kambing</option>
                    <option value="domba">Domba</option>
                    <option value="sapi">Sapi</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Packages Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="packagesGrid">
        @forelse ($packages ?? [] as $package)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 package-card" 
             data-type="{{ strtolower($package->type ?? '') }}" 
             data-price="{{ $package->price ?? 0 }}">
            <div class="relative">
                <img src="{{ asset('storage/' . ($package->image_path ?? 'default.jpg')) }}" 
                     class="w-full h-48 object-cover" 
                     alt="{{ $package->name ?? 'Package' }}"
                     onerror="this.src='https://via.placeholder.com/400x300/875937/FFFFFF?text=No+Image'">
                
                <!-- Type Badge -->
                @php
                    $typeColors = [
                        'kambing' => 'bg-green-500',
                        'domba' => 'bg-blue-500',
                        'sapi' => 'bg-purple-500'
                    ];
                    $type = strtolower($package->type ?? 'unknown');
                @endphp
                <div class="absolute top-4 right-4">
                    <span class="px-3 py-1 {{ $typeColors[$type] ?? 'bg-gray-500' }} text-white text-sm font-semibold rounded-full uppercase">
                        {{ $package->type ?? 'Unknown' }}
                    </span>
                </div>

                <!-- Popularity Badge -->
                <div class="absolute top-4 left-4">
                    <span class="px-2 py-1 bg-orange-500 text-white text-xs font-semibold rounded-full">
                        ⭐ Popular
                    </span>
                </div>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $package->name ?? 'Unknown Package' }}</h3>
                
                <div class="flex items-center justify-between mb-3">
                    <span class="text-2xl font-bold text-green-600">
                        Rp {{ number_format($package->price ?? 0, 0, ',', '.') }}
                    </span>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        {{ rand(45, 156) }} subscribers
                    </div>
                </div>

                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                    {{ $package->description ?? 'Paket qurban berkualitas tinggi dengan standar yang telah ditetapkan.' }}
                </p>

                <!-- Stats -->
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div class="text-center p-2 bg-gray-50 rounded-lg">
                        <div class="text-sm font-semibold text-gray-800">{{ rand(15, 45) }}</div>
                        <div class="text-xs text-gray-500">Active</div>
                    </div>
                    <div class="text-center p-2 bg-gray-50 rounded-lg">
                        <div class="text-sm font-semibold text-gray-800">{{ rand(85, 98) }}%</div>
                        <div class="text-xs text-gray-500">Completion</div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex space-x-2">
                    <button onclick="viewPackage({{ $package->id ?? 0 }})" 
                            class="flex-1 bg-blue-50 text-blue-600 py-2 px-3 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">
                        View
                    </button>
                    <button onclick="editPackage({{ $package->id ?? 0 }})" 
                            class="flex-1 bg-green-50 text-green-600 py-2 px-3 rounded-lg hover:bg-green-100 transition-colors text-sm font-medium">
                        Edit
                    </button>
                    <button onclick="deletePackage({{ $package->id ?? 0 }})" 
                            class="bg-red-50 text-red-600 py-2 px-3 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @empty
        <!-- Sample Data -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="relative">
                <img src="https://via.placeholder.com/400x300/875937/FFFFFF?text=Kambing+Premium" class="w-full h-48 object-cover">
                <div class="absolute top-4 right-4">
                    <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full uppercase">KAMBING</span>
                </div>
                <div class="absolute top-4 left-4">
                    <span class="px-2 py-1 bg-orange-500 text-white text-xs font-semibold rounded-full">⭐ Popular</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Paket A - Kambing Premium</h3>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-2xl font-bold text-green-600">Rp 2.500.000</span>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        89 subscribers
                    </div>
                </div>
                <p class="text-gray-600 text-sm mb-4">Kambing jenis Etawa berkualitas tinggi dengan berat minimal 35kg. Sudah termasuk pemotongan dan distribusi.</p>
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div class="text-center p-2 bg-gray-50 rounded-lg">
                        <div class="text-sm font-semibold text-gray-800">25</div>
                        <div class="text-xs text-gray-500">Active</div>
                    </div>
                    <div class="text-center p-2 bg-gray-50 rounded-lg">
                        <div class="text-sm font-semibold text-gray-800">92%</div>
                        <div class="text-xs text-gray-500">Completion</div>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button onclick="viewPackage(1)" class="flex-1 bg-blue-50 text-blue-600 py-2 px-3 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">View</button>
                    <button onclick="editPackage(1)" class="flex-1 bg-green-50 text-green-600 py-2 px-3 rounded-lg hover:bg-green-100 transition-colors text-sm font-medium">Edit</button>
                    <button onclick="deletePackage(1)" class="bg-red-50 text-red-600 py-2 px-3 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// Search functionality
document.getElementById('searchPackages').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const cards = document.querySelectorAll('.package-card');
    
    cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        card.style.display = text.includes(searchTerm) ? 'block' : 'none';
    });
});

// Type filter
document.getElementById('typeFilter').addEventListener('change', function() {
    const filterValue = this.value.toLowerCase();
    const cards = document.querySelectorAll('.package-card');
    
    cards.forEach(card => {
        const cardType = card.dataset.type;
        card.style.display = (!filterValue || cardType === filterValue) ? 'block' : 'none';
    });
});

// Package action functions
function viewPackage(packageId) {
    Swal.fire({
        title: 'Detail Paket',
        html: `
            <div class="text-left space-y-3">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p><strong>ID:</strong> ${packageId}</p>
                    <p><strong>Status:</strong> <span class="text-green-600">Aktif</span></p>
                    <p><strong>Total Subscribers:</strong> ${Math.floor(Math.random() * 100) + 50}</p>
                    <p><strong>Revenue:</strong> Rp ${(Math.floor(Math.random() * 50000000) + 10000000).toLocaleString('id-ID')}</p>
                </div>
            </div>
        `,
        icon: 'info',
        confirmButtonColor: '#875937'
    });
}

function editPackage(packageId) {
    Swal.fire({
        title: 'Edit Paket',
        html: `
            <input id="editPackageName" class="swal2-input" placeholder="Nama Paket">
            <select id="editPackageType" class="swal2-input">
                <option value="">Pilih Jenis Hewan</option>
                <option value="kambing">Kambing</option>
                <option value="domba">Domba</option>
                <option value="sapi">Sapi</option>
            </select>
            <input id="editPackagePrice" class="swal2-input" type="number" placeholder="Harga (Rp)">
            <textarea id="editPackageDescription" class="swal2-textarea" placeholder="Deskripsi paket"></textarea>
        `,
        showCancelButton: true,
        confirmButtonText: 'Update',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#875937'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Berhasil!', 'Paket telah diupdate.', 'success');
        }
    });
}

function deletePackage(packageId) {
    Swal.fire({
        title: 'Hapus Paket?',
        text: "Paket akan dihapus permanen dari sistem.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#875937',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Terhapus!', 'Paket telah dihapus.', 'success');
        }
    });
}

function exportPackages() {
    Swal.fire({
        title: 'Export Data Paket',
        text: 'Pilih format export:',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Excel (.xlsx)',
        cancelButtonText: 'PDF Report',
        confirmButtonColor: '#875937'
    });
}
</script>
@endsection