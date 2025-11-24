@extends('layouts.app')

@section('content')

{{-- HERO SECTION WITH VIDEO --}}
<section class="relative -mt-4 md:-mt-0">
  <div class="h-[520px] md:h-[640px] overflow-hidden relative">
    {{-- VIDEO BACKGROUND --}}
    <div class="absolute inset-0">
      <video autoplay muted loop playsinline class="w-full h-full object-cover">
        <source src="{{ asset('video/masak.mp4') }}" type="video/mp4">
      </video>
      <div class="absolute inset-0 bg-gradient-to-b from-red-900/70 via-red-800/60 to-orange-900/70"></div>
    </div>

    {{-- HERO CONTENT --}}
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6">
      {{-- LOGO ICON --}}
      <div class="bg-white/10 backdrop-blur-md rounded-full p-6 mb-6 animate-bounce-slow border-4 border-white/30">
        <span class="text-7xl">🍜</span>
      </div>

      {{-- HEADING --}}
      <h1 class="text-5xl md:text-7xl font-black leading-tight drop-shadow-2xl mb-4 animate-fade-in">
        <span class="bg-gradient-to-r from-yellow-300 via-amber-200 to-yellow-300 bg-clip-text text-transparent">
          Warung Nayamul
        </span>
      </h1>
      
      <div class="h-1 w-32 bg-amber-400 rounded-full mb-6"></div>

      {{-- TAGLINE --}}
      <p class="mt-2 text-xl md:text-2xl max-w-3xl font-bold text-amber-100 drop-shadow-lg animate-fade-in-delay">
        Makan enak, harga bersahabat — rasa rumahan yang bikin nagih! 🔥
      </p>

      {{-- CTA BUTTON --}}
      <a href="{{ route('menu.index') }}" 
         class="mt-8 inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-amber-400 to-yellow-500 text-red-900 rounded-xl font-black text-xl shadow-2xl hover:shadow-amber-500/50 hover:scale-110 transition-all duration-300 animate-pulse-slow">
        <span>Lihat Menu Kami</span>
        <span class="text-2xl">🍽️</span>
      </a>

      {{-- FLOATING STATS --}}
      <div class="mt-12 flex gap-6 flex-wrap justify-center">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl px-6 py-3 border-2 border-white/30">
          <p class="text-amber-300 font-black text-2xl">50+</p>
          <p class="text-white text-sm font-semibold">Menu Pilihan</p>
        </div>
        <div class="bg-white/10 backdrop-blur-md rounded-2xl px-6 py-3 border-2 border-white/30">
          <p class="text-amber-300 font-black text-2xl">1000+</p>
          <p class="text-white text-sm font-semibold">Pelanggan Setia</p>
        </div>
        <div class="bg-white/10 backdrop-blur-md rounded-2xl px-6 py-3 border-2 border-white/30">
          <p class="text-amber-300 font-black text-2xl">⭐ 4.9</p>
          <p class="text-white text-sm font-semibold">Rating Tertinggi</p>
        </div>
      </div>
    </div>

    {{-- SCROLL INDICATOR --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
      <div class="flex flex-col items-center text-white">
       
       
      </div>
    </div>
  </div>
</section>

{{-- WHY US SECTION --}}
<section class="py-20 bg-gradient-to-br from-orange-50 via-red-50 to-amber-50">
  <div class="max-w-7xl mx-auto px-6">
    
    {{-- SECTION HEADER --}}
    <div class="text-center mb-16">
      <h2 class="text-5xl font-black text-red-700 mb-4">
        Kenapa Harus <span class="text-amber-600">Warung Nayamul</span>?
      </h2>
      <div class="h-1.5 w-24 bg-red-600 rounded-full mx-auto mb-4"></div>
      <p class="text-gray-600 text-lg font-medium max-w-2xl mx-auto">
        Pengalaman kuliner terbaik dengan harga yang ramah di kantong
      </p>
    </div>

    {{-- FEATURES GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      {{-- FEATURE 1 --}}
      <div class="group bg-white rounded-3xl p-8 shadow-xl border-4 border-orange-200 hover:border-red-500 transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl text-center">
        <div class="bg-gradient-to-br from-red-100 to-orange-100 rounded-2xl p-6 mb-6 inline-block group-hover:scale-110 transition-transform duration-300">
          <img src="{{ asset('icon/cutlery.gif') }}" class="w-20 h-20 mx-auto" alt="Rasa Rumahan">
        </div>
        <h3 class="font-black text-2xl text-gray-800 mb-3">🏠 Rasa Rumahan</h3>
        <p class="text-gray-600 text-base leading-relaxed">
          Masakan dengan bumbu racikan rumah yang bikin kangen masakan ibu
        </p>
        <div class="mt-6 inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
          ⭐ Paling Favorit
        </div>
      </div>

      {{-- FEATURE 2 --}}
      <div class="group bg-white rounded-3xl p-8 shadow-xl border-4 border-orange-200 hover:border-red-500 transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl text-center">
        <div class="bg-gradient-to-br from-green-100 to-emerald-100 rounded-2xl p-6 mb-6 inline-block group-hover:scale-110 transition-transform duration-300">
          <img src="{{ asset('icon/wallet.gif') }}" class="w-20 h-20 mx-auto" alt="Harga Bersahabat">
        </div>
        <h3 class="font-black text-2xl text-gray-800 mb-3">💰 Harga Bersahabat</h3>
        <p class="text-gray-600 text-base leading-relaxed">
          Kantong pelajar? Kantong mahasiswa? Tenang, harga kami pasti cocok!
        </p>
        <div class="mt-6 inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
          💵 Hemat Banget
        </div>
      </div>

      {{-- FEATURE 3 --}}
      <div class="group bg-white rounded-3xl p-8 shadow-xl border-4 border-orange-200 hover:border-red-500 transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl text-center">
        <div class="bg-gradient-to-br from-blue-100 to-cyan-100 rounded-2xl p-6 mb-6 inline-block group-hover:scale-110 transition-transform duration-300">
          <img src="{{ asset('icon/feedback.gif') }}" class="w-20 h-20 mx-auto" alt="Tempat Nyaman">
        </div>
        <h3 class="font-black text-2xl text-gray-800 mb-3">☕ Tempat Nyaman</h3>
        <p class="text-gray-600 text-base leading-relaxed">
          Suasana cozy untuk makan santai, ngobrol, atau sekadar nongkrong
        </p>
        <div class="mt-6 inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-bold">
          🛋️ Super Cozy
        </div>
      </div>

    </div>

    {{-- TESTIMONIAL QUOTE --}}
    <div class="mt-20 bg-gradient-to-r from-red-600 to-orange-600 rounded-3xl p-10 text-center shadow-2xl border-4 border-red-700">
      <span class="text-6xl mb-4 block">💬</span>
      <p class="text-white text-2xl md:text-3xl font-bold italic mb-4">
        "Warung langganan sejak kuliah! Enak, murah, porsinya pas!"
      </p>
      <p class="text-amber-200 font-semibold text-lg">
        - Budi, Pelanggan Setia sejak 2020
      </p>
    </div>

    {{-- CTA SECTION --}}
    <div class="mt-16 text-center">
      <h3 class="text-3xl font-black text-gray-800 mb-6">
        Yuk, Buruan Pesan Sekarang! 🚀
      </h3>
      <a href="{{ route('menu.index') }}" 
         class="inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-red-700 text-white px-10 py-5 rounded-2xl font-black text-xl shadow-2xl hover:shadow-red-500/50 hover:scale-110 transition-all duration-300">
        <span>Lihat Semua Menu</span>
        <span class="text-2xl">🍽️</span>
      </a>
    </div>

  </div>
</section>

<style>
/* Animations */
@keyframes bounce-slow {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-15px);
  }
}

@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes pulse-slow {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.8;
  }
}

.animate-bounce-slow {
  animation: bounce-slow 2s ease-in-out infinite;
}

.animate-fade-in {
  animation: fade-in 1s ease-out;
}

.animate-fade-in-delay {
  animation: fade-in 1s ease-out 0.3s both;
}

.animate-pulse-slow {
  animation: pulse-slow 2s ease-in-out infinite;
}
</style>

@endsection