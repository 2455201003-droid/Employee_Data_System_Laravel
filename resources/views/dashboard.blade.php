<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-blue-900 dark:text-blue-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <span class="text-sm text-blue-600 dark:text-blue-300 font-medium">
                Welcome
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="mb-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl shadow-xl p-6">
                <h3 class="text-2xl font-bold">
                    Hello, {{ Auth::user()->name }} 👋
                </h3>
                <p class="text-blue-100 mt-1">
                    Welcome to your dashboard. Everything looks great today!
                </p>
            </div>

            <!-- Main Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-blue-100 dark:border-gray-700">

                <div class="p-8 text-gray-900 dark:text-gray-100">

                    <!-- Content -->
                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow-md">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Welcome {{ Auth::user()->name }}!
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                You are successfully logged in to the system.
                            </p>
                        </div>

                    </div>

                   

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>