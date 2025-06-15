<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
</head>

<body class="flex h-screen bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="fixed relative w-80 text-white p-6 flex flex-col min-h-screen" style="background-image: url('/storage/images/sabanaprofile.jpeg'); background-size: cover; background-position: center;">
            <!-- Logo -->
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>

            <div class="relative z-10 flex flex-col h-full justify-between">
                <div class= "text-white">    
                    <div class="flex items-center justify-center mb-6">
                        <a href="/dashboard">
                        <img src="{{ asset('storage/images/logo_putih.png') }}" alt="SiQurban Logo" class="h-20">
                        </a>
                    </div>
                
                    <nav class="space-y-2">                 
                        <a href="/dashboard/statistik"
                            class="flex items-center space-x-2 p-2 rounded transition
                            {{ request()->is('dashboard/statistik') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 11V3H6v18h12V11h-7z" />
                            </svg>
                            <span>Statistik Penjualan</span>
                        </a>

                        <a href="/dashboard/data-user"
                            class="flex items-center space-x-2 p-2 rounded transition
                            {{ request()->is('dashboard/data-user') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m4-9a4 4 0 110 8 4 4 0 010-8zm6 4a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span>Data User</span>
                        </a>

                        <a href="/dashboard/packages"
                            class="flex items-center space-x-2 p-2 rounded transition
                            {{ request()->is('dashboard/packages') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Add Packages</span>
                        </a>

                        <a href="/dashboard/progres"
                            class="flex items-center space-x-2 p-2 rounded transition
                            {{ request()->is('dashboard/progres') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h18v4H3V3zm0 6h18v4H3V9zm0 6h18v4H3v-4z" />
                            </svg>
                            <span>Progres Pembelian</span>
                        </a>
                    </nav>
                </div>
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button"
                        onclick="confirmlogout()"
                        class="w-full flex items-center space-x-2 p-2 text-red-600 hover:bg-red-100 rounded transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form> 
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
        <script>
            function confirmLogout() {
                Swal.fire({
                    title: 'Yakin ingin logout?',
                    text: "Kamu akan keluar dari akun SiQurban.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#8B5D33',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, logout',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            }
        </script>
    </div>
</body>

</html>
