<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SiQurban</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <style>
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Sidebar transitions */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }

        /* Mobile menu overlay */
        .mobile-overlay {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        /* Logo animation */
        .logo-animate {
            transition: transform 0.3s ease;
        }
        .logo-animate:hover {
            transform: scale(1.05);
        }

        /* Navigation item hover effect */
        .nav-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }
        .nav-item:hover::before {
            left: 100%;
        }

        /* Main content scroll */
        .main-content {
            height: 100vh;
            overflow-y: auto;
        }

        /* Responsive sidebar */
        @media (max-width: 1024px) {
            .sidebar-desktop {
                transform: translateX(-100%);
            }
            .sidebar-mobile-open {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="bg-gray-100 overflow-hidden">
    <div class="flex h-screen">
        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn" 
                class="lg:hidden fixed top-4 left-4 z-50 bg-[#8B5D33] text-white p-2 rounded-lg shadow-lg hover:bg-[#6d4529] transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Mobile Overlay -->
        <div id="mobileOverlay" 
             class="lg:hidden fixed inset-0 mobile-overlay z-30 hidden"
             onclick="closeMobileSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar" 
               class="sidebar-transition sidebar-desktop lg:translate-x-0 fixed lg:relative w-80 text-white flex flex-col h-full z-40"
               style="background-image: url('/images/sabanaprofile.jpeg'); background-size: cover; background-position: center;">
            
            <!-- Background Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>

            <!-- Sidebar Content -->
            <div class="relative z-10 flex flex-col h-full">
                <!-- Header with Logo -->
                <div class="flex-shrink-0 p-6 border-b border-white/10">
                    <!-- Close button for mobile -->
                    <button id="closeSidebarBtn" 
                            class="lg:hidden absolute top-4 right-4 text-white hover:text-red-300 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <div class="flex items-center justify-center">
                        <a href="/dashboard" class="block">
                            <img src="{{ asset('images/logo_putih.png') }}" 
                                 alt="SiQurban Logo" 
                                 class="h-20 logo-animate">
                        </a>
                    </div>
                    
                    <!-- Admin Info -->
                    <div class="mt-4 text-center">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-2">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-white/90 font-medium">Admin Panel</p>
                        <p class="text-xs text-white/70">{{ auth()->user()->name ?? 'Administrator' }}</p>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="flex-1 p-6 overflow-y-auto custom-scrollbar">
                    <div class="space-y-2">
                        <div class="mb-4">
                            <p class="text-xs font-semibold text-white/60 uppercase tracking-wider mb-2">Dashboard</p>
                        </div>
                        
                        <a href="/dashboard/statistik"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg transition {{ request()->is('dashboard/statistik') || request()->is('dashboard') ? 'bg-white text-[#8B5D33] shadow-lg' : 'hover:bg-white/10 text-white' }}">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <span class="font-medium">Statistik Dashboard</span>
                        </a>

                        <a href="/dashboard/data-user"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg transition {{ request()->is('dashboard/data-user') ? 'bg-white text-[#8B5D33] shadow-lg' : 'hover:bg-white/10 text-white' }}">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                </svg>
                            </div>
                            <span class="font-medium">Data User</span>
                        </a>

                        <a href="/dashboard/packages"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg transition {{ request()->is('dashboard/packages*') ? 'bg-white text-[#8B5D33] shadow-lg' : 'hover:bg-white/10 text-white' }}">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <span class="font-medium">Kelola Paket</span>
                        </a>

                        <a href="/dashboard/progres"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg transition {{ request()->is('dashboard/progres') ? 'bg-white text-[#8B5D33] shadow-lg' : 'hover:bg-white/10 text-white' }}">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="font-medium">Progress Pembelian</span>
                        </a>

                        <!-- Divider -->
                        <div class="my-6 border-t border-white/20"></div>
                        
                        <!-- Additional Menu Items -->
                        <div class="mb-4">
                            <p class="text-xs font-semibold text-white/60 uppercase tracking-wider mb-2">Management</p>
                        </div>

                        <a href="/dashboard/reports"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg transition {{ request()->is('dashboard/reports') ? 'bg-white text-[#8B5D33] shadow-lg' : 'hover:bg-white/10 text-white' }}">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <span class="font-medium">Laporan</span>
                        </a>

                        <a href="/dashboard/settings"
                            class="nav-item flex items-center space-x-3 p-3 rounded-lg transition {{ request()->is('dashboard/settings') ? 'bg-white text-[#8B5D33] shadow-lg' : 'hover:bg-white/10 text-white' }}">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="font-medium">Pengaturan</span>
                        </a>
                    </div>
                </nav>
                
                <!-- Logout Section -->
                <div class="flex-shrink-0 p-6 border-t border-white/20">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <button type="button"
                            onclick="confirmLogout()"
                            class="w-full flex items-center space-x-3 p-3 bg-red-500/20 hover:bg-red-500/30 text-red-200 hover:text-white rounded-lg transition-all duration-200 group">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </div>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                    
                    <!-- Version Info -->
                    <div class="mt-4 text-center">
                        <p class="text-xs text-white/50">SiQurban Admin v1.0</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col min-w-0 lg:ml-0">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 flex-shrink-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <!-- Breadcrumb -->
                        <nav class="flex items-center space-x-2 text-sm text-gray-500">
                            <a href="/dashboard" class="hover:text-[#8B5D33] transition-colors">Dashboard</a>
                            @if(!request()->is('dashboard') && !request()->is('dashboard/statistik'))
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-[#8B5D33] font-medium">
                                    @if(request()->is('dashboard/data-user')) Data User
                                    @elseif(request()->is('dashboard/packages*')) Kelola Paket
                                    @elseif(request()->is('dashboard/progres')) Progress Pembelian
                                    @elseif(request()->is('dashboard/reports')) Laporan
                                    @elseif(request()->is('dashboard/settings')) Pengaturan
                                    @endif
                                </span>
                            @endif
                        </nav>
                    </div>
                    
                    <!-- Top Bar Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-400 hover:text-[#8B5D33] transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- User Profile -->
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-[#8B5D33] rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-medium">
                                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                                </span>
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name ?? 'Administrator' }}</p>
                                <p class="text-xs text-gray-500">Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <div class="flex-1 main-content">
                <div class="p-6">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile sidebar functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        function openMobileSidebar() {
            sidebar.classList.add('sidebar-mobile-open');
            mobileOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileSidebar() {
            sidebar.classList.remove('sidebar-mobile-open');
            mobileOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        mobileMenuBtn.addEventListener('click', openMobileSidebar);
        closeSidebarBtn.addEventListener('click', closeMobileSidebar);

        // Close sidebar when clicking outside on mobile
        mobileOverlay.addEventListener('click', closeMobileSidebar);

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                closeMobileSidebar();
            }
        });

        // Logout confirmation
        function confirmLogout() {
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Kamu akan keluar dari akun SiQurban.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#8B5D33',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-xl',
                    confirmButton: 'rounded-lg',
                    cancelButton: 'rounded-lg'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        // Add active state management
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';
            
            // Initialize tooltips or other components if needed
            console.log('SiQurban Admin Panel loaded successfully');
        });
    </script>
</body>

</html>