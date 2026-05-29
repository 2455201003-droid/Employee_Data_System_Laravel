<x-guest-layout>
    

        <!-- Login Card -->
        <div class="w-full max-w-md bg-white/95 backdrop-blur-xl rounded-[28px] shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white text-center py-8 px-6">
                <h1 class="text-4xl font-extrabold">Welcome </h1>
                <p class="text-sm text-white/80 mt-2">Login to continue to your dashboard</p>
            </div>

            <div class="p-8">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 font-semibold" />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-2xl border-gray-300 px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="you@example.com"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Password -->
                    <div class="mt-5">
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-2xl border-gray-300 px-4 py-3 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200 transition"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center mt-5">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded text-indigo-600 focus:ring-indigo-500 border-gray-300"
                        >
                        <label for="remember_me" class="ms-2 text-sm text-gray-600">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col gap-4 mt-7">

                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                            <a
                                class="text-sm text-center text-gray-500 hover:text-indigo-600 transition"
                                href="{{ route('password.request') }}"
                            >
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <!-- Login Button -->
                        <x-primary-button
                            class="w-full justify-center py-3 rounded-2xl text-lg font-semibold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:scale-[1.02] hover:shadow-xl transition duration-300"
                        >
                            {{ __('🚀 Log in') }}
                        </x-primary-button>

                        <!-- Register Link -->
                        <a
                            href="{{ route('register') }}"
                            class="text-center text-sm text-gray-600 hover:text-purple-600 transition"
                        >
                            {{ __("Don't have an account? Register") }}
                        </a>

                        <!-- Back to Welcome -->
                        <a
                            href="/"
                            class="text-center inline-block mt-2 py-3 rounded-2xl border border-indigo-200 bg-indigo-50 text-indigo-700 font-semibold hover:bg-indigo-100 hover:shadow-md transition"
                        >
                            ← Back to Welcome
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>