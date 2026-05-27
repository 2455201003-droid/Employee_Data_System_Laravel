<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Data Employe') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="/employes" method="POST"  enctype="multipart/form-data" class="mt-6 space-y-6 max-w-xl">
                    @csrf
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif

                    <div>
                        <label for="nip" class="block font-medium text-sm text-gray-700" >NIP</label>
                        <input type="number" minlength="18" value="{{ old('nip') }}" title="NIP harus minimal 18 digit angka" name="nip" id="nip"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            required autofocus>
                    </div>
                    <div>
                        <label for="nama_pegawai" class="block font-medium text-sm text-gray-700">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" value="{{ old('nama_pegawai') }}" id="nama_pegawai" 
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            required autofocus>
                    </div>
                    <div>
                        <label for="jabatan" class="block font-medium text-sm text-gray-700">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            required autofocus>
                    </div>
                    <div>
                        <label for="departement" class="block font-medium text-sm text-gray-700">Departemen</label>
                            <select name="departement_id" required>
                                <option value="">-- Pilih departemen --</option>

                                @foreach($departements as $dep)
                                    <option value="{{ $dep->id }}">
                                        {{ old('departement_id') == $dep->id ? 'selected' : '' }}>
                                        {{ $dep->nama_departemen }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <div>
                        <label for="foto" class="block font-medium text-sm text-gray-700">Foto</label>
                        <input type="file" name="foto"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Simpan Data
                        </button>
                        <a href="/employes"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>