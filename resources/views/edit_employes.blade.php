<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
            ✏️ Edit Data Pegawai
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-2xl mx-auto">

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                <div class="mb-6">
                    <h3 class="text-gray-800 font-semibold text-base flex items-center gap-2">
                        📝 Form Edit Pegawai
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Silakan perbarui data jika ada perubahan
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 bg-red-50 border border-red-200 text-red-700 p-3 rounded-lg text-sm">
                        ⚠️ Ada kesalahan input:
                        <ul class="list-disc pl-5 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/employes/{{ $employe->id }}" method="POST" enctype="multipart/form-data"
                      class="space-y-4">

                    @csrf
                    @method('PUT')

                    <!-- NIP -->
                    <div>
                        <label class="text-sm text-gray-600 flex items-center gap-2">
                            🆔 NIP
                        </label>
                        <input type="number" name="nip"
                            value="{{ $employe->nip }}"
                            class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
                            required>
                    </div>

                    <!-- Nama -->
                    <div>
                        <label class="text-sm text-gray-600 flex items-center gap-2">
                            👤 Nama Pegawai
                        </label>
                        <input type="text" name="nama_pegawai"
                            value="{{ $employe->nama_pegawai }}"
                            class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
                            required>
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label class="text-sm text-gray-600 flex items-center gap-2">
                            💼 Jabatan
                        </label>
                        <input type="text" name="jabatan"
                            value="{{ $employe->jabatan }}"
                            class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none"
                            required>
                    </div>

                    <!-- Departemen -->
                    <div>
                        <label class="text-sm text-gray-600 flex items-center gap-2">
                            🏢 Departemen
                        </label>

                        <select name="departement_id"
                            class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">

                            <option value="">-- Pilih Departemen --</option>

                            @foreach($departements as $dep)
                                <option value="{{ $dep->id }}"
                                    {{ $employe->departement_id == $dep->id ? 'selected' : '' }}>
                                    {{ $dep->nama_departemen }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Foto -->
                    <div>
                        <label class="text-sm text-gray-600 flex items-center gap-2">
                            📷 Foto
                        </label>

                        <input type="file" name="foto"
                            class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 bg-gray-50">
                    </div>

                    <!-- Button -->
                    <div class="flex gap-3 pt-2">

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg shadow-sm transition">
                            💾 Simpan Perubahan
                        </button>

                        <a href="/employes"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-lg border border-gray-200 transition">
                            ↩ Kembali
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>