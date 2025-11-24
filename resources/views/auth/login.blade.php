<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white via-amber-100 to-amber-200 px-4 py-12">

        <div class="w-full max-w-md bg-white/95 backdrop-blur-md shadow-xl rounded-2xl p-8 border border-amber-200">

            {{-- LOGO --}}
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('icon/dish.gif') }}"
                     class="w-20 h-20 object-cover rounded-xl "
                     alt="Logo">

                <h2 class="text-3xl font-extrabold text-red-700 mt-4">
                    Warung Nayamul
                </h2>

                <p class="text-gray-600 mt-2 text-sm">
                    Silakan masuk untuk melanjutkan
                </p>
            </div>

            {{-- SESSION STATUS --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- EMAIL --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-red-600 text-lg">
                            📧
                        </span>

                        <x-text-input id="email"
                            class="block w-full pl-11 pr-4 py-3 rounded-lg border-2 border-amber-300 focus:border-red-600 focus:ring-2 focus:ring-red-600 transition-all"
                            type="email"
                            name="email"
                            :value="old('email')"
                            placeholder="contoh@email.com"
                            required autofocus autocomplete="username" />
                    </div>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-red-600 text-lg">
                            🔒
                        </span>

                        <x-text-input id="password"
                            class="block w-full pl-11 pr-4 py-3 rounded-lg border-2 border-amber-300 focus:border-red-600 focus:ring-2 focus:ring-red-600 transition-all"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required autocomplete="current-password" />
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- REMEMBER + LUPA PASSWORD --}}
                <div class="flex items-center justify-between pt-2">
                    <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer hover:text-gray-900 transition-colors">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-gray-300 text-red-600 focus:ring-red-600 focus:ring-2 cursor-pointer">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-red-700 hover:text-red-900 underline font-medium transition-colors">
                            Lupa password?
                        </a>
                    @endif
                </div>

                {{-- TOMBOL LOGIN --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3.5 bg-red-700 text-white font-bold text-base rounded-xl shadow-lg
                               hover:bg-red-800 hover:shadow-xl hover:scale-[1.02] 
                               active:scale-[0.98] active:shadow-md
                               transition-all duration-200 ease-in-out
                               focus:outline-none focus:ring-4 focus:ring-red-300">
                        Masuk
                    </button>
                </div>

                {{-- DIVIDER --}}
                <div class="relative py-2">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">atau</span>
                    </div>
                </div>

                {{-- REGISTER --}}
                <div class="text-center">
                    <p class="text-sm text-gray-700">
                        Belum punya akun?
                        <a class="text-red-600 font-bold hover:text-red-800 hover:underline transition-colors" 
                           href="{{ route('register') }}">
                            Daftar di sini
                        </a>
                    </p>
                </div>

            </form>

        </div>
    </div>
</x-guest-layout>