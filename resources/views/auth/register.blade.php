<x-guest-layout>
        <!-- Card Register -->
        <div class="w-full max-w-md bg-white/95 backdrop-blur-lg shadow-2xl rounded-[30px] overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 px-8 py-8 text-center text-white">
                <h1 class="text-4xl font-extrabold tracking-wide">
                    Create Account
                </h1>
                <p class="mt-2 text-sm text-blue-100">
                    Register to continue using the system
                </p>
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label
                            for="name"
                            :value="__('Full Name')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="name"
                            class="block mt-2 w-full rounded-2xl border border-gray-300 px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition duration-300"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                        />

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2 text-red-500"
                        />
                    </div>

                    <!-- Email -->
                    <div class="mt-5">
                        <x-input-label
                            for="email"
                            :value="__('Email Address')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-2xl border border-gray-300 px-4 py-3 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-300"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="example@email.com"
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2 text-red-500"
                        />
                    </div>

                    <!-- Password -->
                    <div class="mt-5">
                        <x-input-label
                            for="password"
                            :value="__('Password')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-2xl border border-gray-300 px-4 py-3 shadow-sm focus:border-pink-500 focus:ring focus:ring-pink-200 transition duration-300"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Enter password"
                        />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2 text-red-500"
                        />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-5">
                        <x-input-label
                            for="password_confirmation"
                            :value="__('Confirm Password')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="password_confirmation"
                            class="block mt-2 w-full rounded-2xl border border-gray-300 px-4 py-3 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 transition duration-300"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Repeat your password"
                        />

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2 text-red-500"
                        />
                    </div>

                    <!-- Button Register -->
                    <div class="mt-8">
                        <x-primary-button
                            class="w-full justify-center py-3 rounded-2xl text-lg font-semibold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 hover:scale-[1.02] hover:shadow-xl transition duration-300"
                        >
                            {{ __('🚀 Register') }}
                        </x-primary-button>
                    </div>

                    <!-- Footer Button -->
                    <div class="mt-6 flex flex-col gap-3 text-center">

                        <!-- Login -->
                        <a
                            href="{{ route('login') }}"
                            class="text-sm text-gray-600 hover:text-indigo-600 transition duration-300 font-medium"
                        >
                            {{ __('Already registered? Login here') }}
                        </a>

                        <!-- Back Welcome -->
                        <a
                            href="/"
                            class="inline-flex items-center justify-center rounded-2xl border border-indigo-200 bg-indigo-50 px-5 py-3 text-indigo-700 font-semibold hover:bg-indigo-100 hover:shadow-md transition duration-300"
                        >
                            ← Back to Welcome
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
```
