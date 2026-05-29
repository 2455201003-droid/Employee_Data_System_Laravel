<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-6">
                    <a href="/employes/Add"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Tambah Data Pegawai
                    </a>
                </div>
                <form action="/employes" method="GET" class="mb-6 flex items-center gap-2">

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari pegawai..."
                        class="border border-gray-300 rounded-md shadow-sm px-4 py-2 w-64 focus:ring focus:ring-blue-200">
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-500">
                        Search
                    </button>
                </form>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600 border-collapse border border-gray-300">
                        <thead class="bg-gray-100 text-gray-800">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 font-semibold text-center">NIP</th>
                                <th class="border border-gray-300 px-4 py-2 font-semibold text-center">Nama Pegawai</th>
                                <th class="border border-gray-300 px-4 py-2 font-semibold text-center">Jabatan</th>
                                <th class="border border-gray-300 px-4 py-2 font-semibold text-center">Departemen</th>
                                <th class="border border-gray-300 px-4 py-2 font-semibold text-center">foto</th>
                                <th class="border border-gray-300 px-4 py-2 font-semibold text-center">Tanggal Masuk</th>
                                <th class="border border-gray-300 px-4 py-2 font-semibold text-center">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $employe)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $employe->nip }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $employe->nama_pegawai}}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $employe->jabatan}}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $employe->departement->nama_departemen ?? '-' }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center"> 
                                        @if($employe->foto)
                                            <img src="{{ asset('foto_pegawai/' . $employe->foto) }}"
                                                width="80" class="rounded mx-auto">
                                        @else
                                            Tidak ada foto
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $employe->tanggal_masuk}}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                                        <a href="/employes/{{ $employe->id }}/edit"
                                            class="inline-flex items-center px-3 py-1.5 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Update
                                        </a>
                                        <form action="/employes/{{ $employe->id }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                onclick="return confirm('Yakin Hapus?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if(count($data) == 0)
                                <tr>
                                    <td colspan="3" class="border border-gray-300 px-4 py-4 text-center text-gray-500">
                                        Belum ada data pegawai yang masuk.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $data->withQueryString()->links() }}
                    </div>
                </div>
                <div class="mb-6">
                    <a href="/employes/pdf"
                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500">
                        Cetak PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>