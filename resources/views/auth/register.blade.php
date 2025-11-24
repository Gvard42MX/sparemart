<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white-100 to-amber-200 px-6 py-16">

        <div class="w-full max-w-md bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl p-8 border border-amber-300
                    animate-[fadeIn_0.8s_ease-out]">

            {{-- HEADER --}}
            <div class="text-center mb-8">
                <img src="/Icon/dish.GIF"
                     class="w-20 mx-auto  animate-[fadeIn_1s_ease-out]"
                     alt="Icon">
                
                <h2 class="text-3xl font-extrabold text-red-700 mt-3 tracking-wide">
                    Buat Akun Baru
                </h2>

                <p class="text-gray-600 mt-1 text-sm">Akses fitur lengkap Warung Nayamul</p>
            </div>

            {{-- FORM --}}
            <form method="POST" action="{{ route('register') }}" class="space-y-5 animate-[slideUp_0.7s_ease-out]">
                @csrf

                {{-- NAME --}}
                <div>
                    <label class="text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <div class="relative mt-1">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-red-600">
                            👤
                        </span>

                        <x-text-input
                            id="name"
                            class="block w-full pl-10 rounded-lg border-amber-300 focus:border-red-600 focus:ring-red-600"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required autofocus autocomplete="name" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="text-sm font-semibold text-gray-700">Email</label>
                    <div class="relative mt-1">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-red-600">
                            📧
                        </span>

                        <x-text-input
                            id="email"
                            class="block w-full pl-10 rounded-lg border-amber-300 focus:border-red-600 focus:ring-red-600"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="text-sm font-semibold text-gray-700">Password</label>
                    <div class="relative mt-1">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-red-600">
                            🔒
                        </span>

                        <x-text-input
                            id="password"
                            class="block w-full pl-10 rounded-lg border-amber-300 focus:border-red-600 focus:ring-red-600"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                {{-- CONFIRM --}}
                <div>
                    <label class="text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                    <div class="relative mt-1">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-red-600">
                            🔒
                        </span>

                        <x-text-input
                            id="password_confirmation"
                            class="block w-full pl-10 rounded-lg border-amber-300 focus:border-red-600 focus:ring-red-600"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                {{-- ACTIONS --}}
                <button type="submit"
                        class="w-full py-3 bg-red-700 text-white font-semibold rounded-xl shadow-lg
                               hover:bg-red-600 hover:scale-[1.02] active:scale-95 transition-all">
                    Daftar Sekarang
                </button>

                <p class="text-center text-sm text-gray-700 mt-2">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                       class="text-red-600 font-semibold hover:underline">
                        Masuk di sini
                    </a>
                </p>

            </form>

        </div>
    </div>

    {{-- ANIMASI --}}
    <style>
        @keyframes fadeIn {
            0% { opacity:0; }
            100% { opacity:1; }
        }
        @keyframes slideUp {
            0% { opacity:0; transform: translateY(20px); }
            100% { opacity:1; transform: translateY(0); }
        }
    </style>

</x-guest-layout>
