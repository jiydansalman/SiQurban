@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <!-- Header Dashboard -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard SiQurban</h1>
        <p class="text-gray-600">Monitoring dan analisis platform tabungan qurban</p>
    </div>

    <!-- Statistik Utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Pengguna -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Pengguna</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($totalUsers ?? 1234) }}</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-500 text-sm font-medium">+12.5%</span>
                        <span class="text-gray-500 text-sm ml-2">bulan ini</span>
                    </div>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Tabungan -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Tabungan</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">Rp {{ number_format($totalSavings ?? 2500000000, 0, ',', '.') }}</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-500 text-sm font-medium">+18.3%</span>
                        <span class="text-gray-500 text-sm ml-2">bulan ini</span>
                    </div>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Qurban Terealisasi -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Qurban Terealisasi</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $completedQurban ?? 567 }}</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-500 text-sm font-medium">+25</span>
                        <span class="text-gray-500 text-sm ml-2">minggu ini</span>
                    </div>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Paket Aktif -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Paket Aktif</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $activePackages ?? 12 }}</p>
                    <div class="flex items-center mt-2">
                        <span class="text-blue-500 text-sm font-medium">{{ $activeUsers ?? 891 }} pengguna</span>
                    </div>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik dan Analisis -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Grafik Pertumbuhan Tabungan -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Pertumbuhan Tabungan</h3>
                <select class="text-sm border-gray-300 rounded-md">
                    <option>7 hari terakhir</option>
                    <option>30 hari terakhir</option>
                    <option>3 bulan terakhir</option>
                </select>
            </div>
            <div class="h-64 flex items-end justify-between space-x-2">
                @php
                $chartData = [
                    ['day' => 'Sen', 'amount' => 85],
                    ['day' => 'Sel', 'amount' => 92],
                    ['day' => 'Rab', 'amount' => 78],
                    ['day' => 'Kam', 'amount' => 96],
                    ['day' => 'Jum', 'amount' => 88],
                    ['day' => 'Sab', 'amount' => 94],
                    ['day' => 'Min', 'amount' => 100],
                ];
                @endphp
                @foreach($chartData as $data)
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-8 bg-gradient-to-t from-blue-500 to-blue-300 rounded-t" style="height: {{ $data['amount'] }}%"></div>
                    <span class="text-xs text-gray-500">{{ $data['day'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Distribusi Jenis Hewan -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Distribusi Jenis Hewan Qurban</h3>
            <div class="space-y-4">
                @php
                $animalData = [
                    ['type' => 'Kambing', 'count' => 245, 'percentage' => 45, 'color' => 'bg-green-500'],
                    ['type' => 'Domba', 'count' => 187, 'percentage' => 35, 'color' => 'bg-blue-500'],
                    ['type' => 'Sapi', 'count' => 135, 'percentage' => 20, 'color' => 'bg-purple-500'],
                ];
                @endphp
                @foreach($animalData as $animal)
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-4 h-4 {{ $animal['color'] }} rounded"></div>
                        <span class="font-medium">{{ $animal['type'] }}</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-32 bg-gray-200 rounded-full h-2">
                            <div class="{{ $animal['color'] }} h-2 rounded-full" style="width: {{ $animal['percentage'] }}%"></div>
                        </div>
                        <span class="text-sm font-semibold">{{ $animal['count'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Aktivitas Terbaru dan Top Performers -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Aktivitas Terbaru -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                @php
                $recentActivities = [
                    ['user' => 'Ahmad Fauzi', 'action' => 'menyelesaikan tabungan', 'package' => 'Paket Kambing B', 'time' => '2 menit lalu', 'icon' => 'check', 'color' => 'text-green-500'],
                    ['user' => 'Siti Nurhaliza', 'action' => 'mendaftar paket', 'package' => 'Paket Sapi C', 'time' => '15 menit lalu', 'icon' => 'plus', 'color' => 'text-blue-500'],
                    ['user' => 'Muhammad Rizki', 'action' => 'melakukan setoran', 'package' => 'Paket Domba A', 'time' => '1 jam lalu', 'icon' => 'money', 'color' => 'text-purple-500'],
                    ['user' => 'Fatimah Azzahra', 'action' => 'mengaktifkan reminder', 'package' => 'Paket Kambing A', 'time' => '2 jam lalu', 'icon' => 'bell', 'color' => 'text-orange-500'],
                ];
                @endphp
                @foreach($recentActivities as $activity)
                <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                        @if($activity['icon'] == 'check')
                            <svg class="w-5 h-5 {{ $activity['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        @elseif($activity['icon'] == 'plus')
                            <svg class="w-5 h-5 {{ $activity['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        @elseif($activity['icon'] == 'money')
                            <svg class="w-5 h-5 {{ $activity['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5 {{ $activity['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-sm">
                            <span class="font-semibold">{{ $activity['user'] }}</span>
                            {{ $activity['action'] }}
                            <span class="font-medium text-gray-700">{{ $activity['package'] }}</span>
                        </p>
                        <p class="text-xs text-gray-500">{{ $activity['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top Performers -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Pengguna Teratas Bulan Ini</h3>
            <div class="space-y-4">
                @php
                $topUsers = [
                    ['name' => 'Abdullah Rahman', 'savings' => 2500000, 'progress' => 95, 'rank' => 1],
                    ['name' => 'Khadijah Islamiah', 'savings' => 2100000, 'progress' => 88, 'rank' => 2],
                    ['name' => 'Omar Al-Faruq', 'savings' => 1950000, 'progress' => 82, 'rank' => 3],
                    ['name' => 'Aisyah Putri', 'savings' => 1750000, 'progress' => 75, 'rank' => 4],
                ];
                @endphp
                @foreach($topUsers as $user)
                <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 {{ $user['rank'] <= 3 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 'bg-gray-300' }} rounded-full flex items-center justify-center">
                            <span class="text-xs font-bold {{ $user['rank'] <= 3 ? 'text-white' : 'text-gray-600' }}">#{{ $user['rank'] }}</span>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">{{ $user['name'] }}</p>
                            <p class="text-xs text-gray-500">Rp {{ number_format($user['savings'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-16 bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full" style="width: {{ $user['progress'] }}%"></div>
                        </div>
                        <span class="text-xs font-semibold">{{ $user['progress'] }}%</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="/admin/users" class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
                <span class="font-medium">Kelola Pengguna</span>
            </a>
            <a href="/admin/packages" class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                <span class="font-medium">Kelola Paket</span>
            </a>
            <a href="/admin/reports" class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <span class="font-medium">Laporan</span>
            </a>
            <a href="/admin/settings" class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="font-medium">Pengaturan</span>
            </a>
        </div>
    </div>
</div>
@endsection