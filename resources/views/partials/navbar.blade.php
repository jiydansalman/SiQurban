<!-- Modern Minimalist Navbar Component -->
<nav class="fixed top-0 left-0 w-full bg-white/10 backdrop-blur-md border-b border-white/20 text-white py-3 px-8 flex justify-center space-x-10 z-50 transition-all duration-300">
    <a href="/home" 
       style="font-family: 'Actor', sans-serif;" 
       class="relative text-base font-normal hover:text-white transition-colors duration-300 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:-bottom-1 after:transition-all after:duration-300 hover:after:w-full 
       {{ request()->is('home') ? 'text-white font-medium after:w-full' : 'text-white/80' }}">
        Home
    </a>
    
    <a href="/packages" 
       style="font-family: 'Actor', sans-serif;" 
       class="relative text-base font-normal hover:text-white transition-colors duration-300 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:-bottom-1 after:transition-all after:duration-300 hover:after:w-full 
       {{ request()->is('packages') ? 'text-white font-medium after:w-full' : 'text-white/80' }}">
        Packages
    </a>
    
    <a href="/tabunganku" 
       style="font-family: 'Actor', sans-serif;" 
       class="relative text-base font-normal hover:text-white transition-colors duration-300 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:-bottom-1 after:transition-all after:duration-300 hover:after:w-full 
       {{ request()->is('tabunganku') ? 'text-white font-medium after:w-full' : 'text-white/80' }}">
        Tabunganku
    </a>
    
    <a href="/profile/edit" 
       style="font-family: 'Actor', sans-serif;" 
       class="relative text-base font-normal hover:text-white transition-colors duration-300 after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-white after:left-0 after:-bottom-1 after:transition-all after:duration-300 hover:after:w-full 
       {{ request()->is('profile/edit') || request()->is('profile') ? 'text-white font-medium after:w-full' : 'text-white/80' }}">
        Profile
    </a>
</nav>