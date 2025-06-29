<!DOCTYPE html>
<html id=profile lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiQurban - User Profile Layout</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
</head>
<body class="flex h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="fixed relative w-80 text-white p-6 flex flex-col min-h-screen" style="background-image: url('/images/sabanaprofile.jpeg'); background-size: cover; background-position: center;">
    <!-- Overlay hanya di sidebar -->
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <!-- Isi sidebar -->
    <div class="relative z-10 flex flex-col h-full justify-between">
      <div>
        <div class="flex items-center justify-center mb-6">
          <a href="/home">
            <img src="{{ asset('images/logo_putih.png') }}" alt="SiQurban Logo" class="h-20">
          </a>
        </div>

        <nav class="flex flex-col space-y-4">
          <a href="/profile/edit"
            class="flex items-center space-x-2 p-2 rounded transition 
            {{ request()->is('profile/edit') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <span>Edit Profile</span>
          </a>
          <a href="/profile/password"
            class="flex items-center space-x-2 p-2 rounded transition 
            {{ request()->is('password') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
            <span>Password</span>
          </a>
          <a href="/profile/notification"
            class="flex items-center space-x-2 p-2 rounded transition 
            {{ request()->is('notification') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            <span>Notification</span>
          </a>
          <a href="/profile/history"
            class="flex items-center space-x-2 p-2 rounded transition 
            {{ request()->is('history') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/>
            </svg>
            <span>History</span>
          </a>
          <a href="/profile/status"
            class="flex items-center space-x-2 p-2 rounded transition 
            {{ request()->is('status') ? 'bg-white text-[#8B5D33]' : 'hover:bg-white hover:text-[#8B5D33] text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="m9 14 2 2 4-4"/>
            </svg>
            <span>Status</span>
          </a>
        </nav>
      </div>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}" id="logout-form" class="mt-10">
        @csrf
        <button type="submit"
          class="w-full flex items-center space-x-2 p-2 rounded text-white hover:bg-white hover:text-[#8B5D33] transition">
          <!-- Icon logout -->
          <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l3 3m0 0l-3 3m3-3H3" />
          </svg>
          <span>Log Out</span>
        </button>
      </form>
    </div>
  </aside>

  <!-- Konten utama -->
  <main class="flex-1 p-8">
    @yield('content')
  </main>
  

</body>
</html>
