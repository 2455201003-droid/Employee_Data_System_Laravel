<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-600">
            Add New Employee
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-500 to-cyan-500 p-6 text-white">
                    <h1 class="text-3xl font-bold">
                        Tambah Data Pegawai
                    </h1>

                    <p class="opacity-90 mt-1">
                        Isi data pegawai dengan lengkap
                    </p>
                </div>

                <!-- Form -->
                <div class="p-8">

                    <form action="/employes"
                          method="POST"
                          enctype="multipart/form-data"
                          class="space-y-6">

                        @csrf

                        <!-- Error -->
                        @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-xl">
                            <ul class="list-disc ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- NIP -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                NIP
                            </label>

                            <input type="number"
                                   name="nip"
                                   value="{{ old('nip') }}"
                                   class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                                   placeholder="Masukkan NIP">
                        </div>

                        <!-- Nama -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Pegawai
                            </label>

                            <input type="text"
                                   name="nama_pegawai"
                                   value="{{ old('nama_pegawai') }}"
                                   class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                                   placeholder="Masukkan nama pegawai">
                        </div>

                        <!-- Jabatan -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Jabatan
                            </label>

                            <input type="text"
                                   name="jabatan"
                                   value="{{ old('jabatan') }}"
                                   class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                                   placeholder="Masukkan jabatan">
                        </div>

                        <!-- Departemen -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Departemen
                            </label>

                            <select name="departement_id"
                                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400">

                                <option value="">
                                    -- Pilih Departemen --
                                </option>

                                @foreach($departements as $dep)
                                    <option value="{{ $dep->id }}">
                                        {{ $dep->nama_departemen }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Foto -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Upload Foto
                            </label>

                            <input type="file"
                                   name="foto"
                                   class="w-full border border-gray-300 rounded-xl p-3">
                        </div>

                        <!-- Button -->
                        <div class="flex gap-4 pt-4">

                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600
                                       text-white px-6 py-3 rounded-xl
                                       font-semibold shadow-lg transition">

                                Simpan Data

                            </button>

                            <a href="/employes"
                               class="bg-gray-200 hover:bg-gray-300
                                      text-gray-700 px-6 py-3 rounded-xl
                                      font-semibold transition">

                                Batal

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>