<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name', 'Warung Nayamul') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-orange-50 via-amber-50 to-red-50 text-gray-800 font-sans">

{{-- NAVBAR KEREN --}}
<header class="sticky top-0 z-50 bg-gradient-to-r from-red-600 via-red-700 to-orange-600 text-white shadow-2xl border-b-4 border-amber-400">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      
      {{-- LOGO --}}
      <a href="{{ url('/') }}" class="flex items-center gap-3 group"> 
        <div class="relative">
          <img src="/Icon/dish.GIF" 
               class="w-14 h-14 rounded-full shadow-xl border-3 border-white group-hover:scale-110 group-hover:rotate-6 transition-all duration-300" 
               alt="Logo Warung Nayamul">
          <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white animate-pulse"></div>
        </div>
        <div class="flex flex-col">
          <span class="text-2xl font-black tracking-tight group-hover:text-amber-300 transition-colors">Warung Nayamul</span>
          <span class="text-xs text-amber-200 font-semibold">Rasa Rumahan, Harga Bersahabat</span>
        </div>
      </a>

      {{-- DESKTOP NAVIGATION --}}
      <nav class="hidden md:flex items-center gap-2">
        @guest
          <a href="{{ route('menu.index') }}" 
             class="px-5 py-2 rounded-xl font-bold hover:bg-white/20 hover:scale-105 transition-all duration-200 flex items-center gap-2">
            <span>🍽️</span>
            <span>Menu</span>
          </a>
          <a href="{{ route('login') }}" 
             class="px-6 py-2.5 rounded-xl bg-amber-400 text-red-900 font-bold hover:bg-amber-300 hover:scale-105 shadow-lg hover:shadow-xl transition-all duration-200">
            Login
          </a>
          <a href="{{ route('register') }}" 
             class="px-6 py-2.5 rounded-xl bg-white text-red-600 font-bold hover:bg-gray-100 hover:scale-105 shadow-lg hover:shadow-xl transition-all duration-200">
            Register
          </a>
        @endguest

        @auth
          <a href="{{ route('menu.index') }}" 
             class="px-5 py-2 rounded-xl font-bold hover:bg-white/20 hover:scale-105 transition-all duration-200 flex items-center gap-2">
            <span>🍽️</span>
            <span>Menu</span>
          </a>
          
          @if(auth()->user()->role === 'admin')
            <a href="{{ route('Keuangan.index') }}" 
               class="px-5 py-2 rounded-xl font-bold hover:bg-white/20 hover:scale-105 transition-all duration-200 flex items-center gap-2">
              <span>💰</span>
              <span>Keuangan</span>
            </a>
            <a href="{{ route('menu.create') }}" 
               class="px-5 py-2.5 rounded-xl bg-green-500 text-white font-bold hover:bg-green-600 hover:scale-105 shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
              <span>+</span>
              <span>Tambah Menu</span>
            </a>
          @endif

          {{-- USER DROPDOWN --}}
          <div class="relative group ml-2">
            <button class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-white/20 transition-all duration-200">
              <div class="w-9 h-9 bg-amber-400 rounded-full flex items-center justify-center font-black text-red-900 border-2 border-white shadow-lg">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
              </div>
              <span class="font-bold">{{ auth()->user()->name }}</span>
              <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            
            <div class="hidden group-hover:block absolute right-0 mt-2 w-56 bg-white text-gray-800 rounded-xl shadow-2xl border-2 border-red-200 overflow-hidden">
              <div class="px-4 py-3 bg-gradient-to-r from-red-50 to-orange-50 border-b-2 border-red-200">
                <p class="text-sm text-gray-600 font-semibold">Signed in as</p>
                <p class="text-base font-black text-red-700 truncate">{{ auth()->user()->email }}</p>
              </div>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left px-4 py-3 hover:bg-red-50 font-bold text-red-600 flex items-center gap-2 transition-colors">
                  <span>🚪</span>
                  <span>Logout</span>
                </button>
              </form>
            </div>
          </div>
        @endauth
      </nav>

      {{-- MOBILE HAMBURGER --}}
      <div class="md:hidden">
        <button id="hamburgerBtn" class="p-3 rounded-xl hover:bg-white/20 focus:outline-none transition-all duration-200">
          <svg id="hamburgerIcon" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>

  {{-- MOBILE MENU --}}
  <div id="mobileMenu" class="hidden md:hidden bg-gradient-to-b from-red-700 to-red-800 border-t-2 border-amber-400">
    <div class="px-4 py-4 space-y-2">
      @guest
        <a href="{{ route('menu.index') }}" 
           class="block py-3 px-4 text-white font-bold rounded-lg hover:bg-white/20 transition-all flex items-center gap-2">
          <span>🍽️</span>
          <span>Menu</span>
        </a>
        <a href="{{ route('login') }}" 
           class="block py-3 px-4 bg-amber-400 text-red-900 font-bold rounded-lg hover:bg-amber-300 transition-all text-center">
          Login
        </a>
        <a href="{{ route('register') }}" 
           class="block py-3 px-4 bg-white text-red-600 font-bold rounded-lg hover:bg-gray-100 transition-all text-center">
          Register
        </a>
      @endguest
      
      @auth
        <a href="{{ route('menu.index') }}" 
           class="block py-3 px-4 text-white font-bold rounded-lg hover:bg-white/20 transition-all flex items-center gap-2">
          <span>🍽️</span>
          <span>Menu</span>
        </a>
        
        @if(auth()->user()->role === 'admin')
          <a href="{{ route('Keuangan.index') }}" 
             class="block py-3 px-4 text-white font-bold rounded-lg hover:bg-white/20 transition-all flex items-center gap-2">
            <span>💰</span>
            <span>Keuangan</span>
          </a>
          <a href="{{ route('menu.create') }}" 
             class="block py-3 px-4 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 transition-all flex items-center gap-2">
            <span>+</span>
            <span>Tambah Menu</span>
          </a>
        @endif
        
        <div class="pt-3 border-t-2 border-white/20">
          <div class="px-4 py-2 text-amber-200 text-sm font-semibold">
            {{ auth()->user()->name }}
          </div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full text-left py-3 px-4 text-white font-bold rounded-lg hover:bg-white/20 transition-all flex items-center gap-2">
              <span>🚪</span>
              <span>Logout</span>
            </button>
          </form>
        </div>
      @endauth
    </div>
  </div>
</header>

{{-- MAIN CONTENT --}}
<main class="min-h-screen">
  @yield('content')
</main>

{{-- FOOTER KEREN --}}
<footer class="bg-gradient-to-r from-red-900 via-red-800 to-orange-900 text-white border-t-4 border-amber-400">
  <div class="max-w-7xl mx-auto px-6 py-12">
    
    {{-- FOOTER TOP --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
      
      {{-- ABOUT --}}
      <div class="md:col-span-2">
        <div class="flex items-center gap-3 mb-4">
          <img src="/Icon/dish.GIF" class="w-16 h-16 rounded-full shadow-xl border-3 border-white" alt="Logo">
          <div>
            <h3 class="text-2xl font-black">Warung Nayamul</h3>
            <p class="text-amber-300 text-sm font-semibold">Rasa Rumahan, Harga Bersahabat</p>
          </div>
        </div>
        <p class="text-gray-300 leading-relaxed mb-4">
          Warung makan yang menyajikan berbagai menu makanan dan minuman dengan cita rasa rumahan yang autentik. Sejak 2020, kami melayani dengan sepenuh hati!
        </p>
        <div class="flex gap-3">
          <a href="#" class="w-10 h-10 bg-white/20 hover:bg-amber-400 rounded-full flex items-center justify-center transition-all hover:scale-110">
            <span class="text-xl">📘</span>
          </a>
          <a href="#" class="w-10 h-10 bg-white/20 hover:bg-amber-400 rounded-full flex items-center justify-center transition-all hover:scale-110">
            <span class="text-xl">📷</span>
          </a>
          <a href="#" class="w-10 h-10 bg-white/20 hover:bg-amber-400 rounded-full flex items-center justify-center transition-all hover:scale-110">
            <span class="text-xl">🐦</span>
          </a>
        </div>
      </div>

      {{-- QUICK LINKS --}}
      <div>
        <h4 class="text-lg font-black mb-4 text-amber-300">Menu Cepat</h4>
        <ul class="space-y-2">
          <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-amber-300 transition-colors flex items-center gap-2">
            <span>→</span>
            <span>Beranda</span>
          </a></li>
          <li><a href="{{ route('menu.index') }}" class="text-gray-300 hover:text-amber-300 transition-colors flex items-center gap-2">
            <span>→</span>
            <span>Lihat Menu</span>
          </a></li>
          @auth
            @if(auth()->user()->role === 'admin')
              <li><a href="{{ route('Keuangan.index') }}" class="text-gray-300 hover:text-amber-300 transition-colors flex items-center gap-2">
                <span>→</span>
                <span>Keuangan</span>
              </a></li>
            @endif
          @endauth
          <li><a href="#" class="text-gray-300 hover:text-amber-300 transition-colors flex items-center gap-2">
            <span>→</span>
            <span>Tentang Kami</span>
          </a></li>
        </ul>
      </div>

      {{-- CONTACT INFO --}}
      <div>
        <h4 class="text-lg font-black mb-4 text-amber-300">Hubungi Kami</h4>
        <ul class="space-y-3 text-gray-300">
          <li class="flex items-start gap-3">
            <span class="text-xl">📍</span>
            <span>Jl. Raya Warung No. 123<br>Tangerang, Banten</span>
          </li>
          <li class="flex items-center gap-3">
            <span class="text-xl">📞</span>
            <span>+62 812-3456-7890</span>
          </li>
          <li class="flex items-center gap-3">
            <span class="text-xl">📧</span>
            <span>info@warungnayamul.com</span>
          </li>
          <li class="flex items-center gap-3">
            <span class="text-xl">⏰</span>
            <span>Buka: 07.00 - 21.00 WIB</span>
          </li>
        </ul>
      </div>
    </div>

    {{-- FOOTER BOTTOM --}}
    <div class="border-t-2 border-white/20 pt-6">
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-gray-300 text-sm text-center md:text-left">
          &copy; {{ date('Y') }} <span class="font-bold text-amber-300">Warung Nayamul</span>. All rights reserved.
        </p>
        <div class="flex gap-6 text-sm text-gray-300">
          <a href="#" class="hover:text-amber-300 transition-colors">Kebijakan Privasi</a>
          <span class="text-white/30">|</span>
          <a href="#" class="hover:text-amber-300 transition-colors">Syarat & Ketentuan</a>
        </div>
      </div>
    </div>

  </div>
</footer>

<script>
  const hamburgerBtn = document.getElementById('hamburgerBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const hamburgerIcon = document.getElementById('hamburgerIcon');
  
  hamburgerBtn?.addEventListener('click', function(){
    mobileMenu.classList.toggle('hidden');
    
    // Toggle icon animation
    if(mobileMenu.classList.contains('hidden')) {
      hamburgerIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16"></path>';
    } else {
      hamburgerIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>';
    }
  });
</script>

</body>
</html>