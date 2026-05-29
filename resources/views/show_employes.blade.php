<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-blue-800 leading-tight">
                {{ __('Daftar Pegawai') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-blue-50 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-2xl p-6 border border-blue-100">

                <!-- Action -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                    <a href="/employes/Add"
                        class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold text-sm hover:bg-blue-500 transition shadow-sm">
                        + Tambah Pegawai
                    </a>

                    <a href="/employes/pdf"
                        class="inline-flex items-center px-5 py-2.5 bg-red-500 text-white rounded-xl font-semibold text-sm hover:bg-red-400 transition shadow-sm">
                        Cetak PDF
                    </a>

                </div>

                <!-- Search -->
                <form action="/employes" method="GET" class="mb-6 flex flex-col md:flex-row gap-2">

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari pegawai..."
                        class="w-full md:w-72 px-4 py-2 rounded-xl border border-blue-200 focus:ring-2 focus:ring-blue-300 outline-none">

                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-500 transition">
                        Search
                    </button>
                </form>

                <!-- Table -->
                <div class="overflow-x-auto rounded-xl border border-blue-100">

                    <table class="w-full text-sm text-left">

                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-center">NIP</th>
                                <th class="px-4 py-3 text-center">Nama</th>
                                <th class="px-4 py-3 text-center">Jabatan</th>
                                <th class="px-4 py-3 text-center">Departemen</th>
                                <th class="px-4 py-3 text-center">Foto</th>
                                <th class="px-4 py-3 text-center">Tanggal Masuk</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-blue-100">

                            @foreach ($data as $employe)
                                <tr class="hover:bg-blue-50 transition">

                                    <td class="px-4 py-3 text-center">{{ $employe->nip }}</td>
                                    <td class="px-4 py-3 text-center font-medium text-gray-700">
                                        {{ $employe->nama_pegawai }}
                                    </td>
                                    <td class="px-4 py-3 text-center">{{ $employe->jabatan }}</td>
                                    <td class="px-4 py-3 text-center">
                                        {{ $employe->departement->nama_departemen ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        @if($employe->foto)
                                            <img src="{{ asset('foto_pegawai/' . $employe->foto) }}"
                                                class="w-12 h-12 object-cover rounded-full mx-auto border border-blue-200">
                                        @else
                                            <span class="text-gray-400 text-xs">No photo</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        {{ $employe->tanggal_masuk }}
                                    </td>

                                    <td class="px-4 py-3 text-center space-x-2">

                                        <a href="/employes/{{ $employe->id }}/edit"
                                            class="inline-flex px-3 py-1 bg-yellow-400 text-white rounded-lg text-base hover:bg-yellow-300 transition">
                                            Edit
                                        </a>

                                        <form action="/employes/{{ $employe->id }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="inline-flex px-3 py-1 bg-red-500 text-white rounded-lg text-base hover:bg-red-400 transition"
                                                onclick="return confirm('Yakin Hapus?')">
                                                Hapus
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach

                            @if(count($data) == 0)
                                <tr>
                                    <td colspan="7" class="text-center py-6 text-gray-400">
                                        Belum ada data pegawai
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-5">
                    {{ $data->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>