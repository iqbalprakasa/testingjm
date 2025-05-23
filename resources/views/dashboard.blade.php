<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Daftar Pasien</h3>
                    @if (Auth::user()->role === 'registrasi')
                    <a href="{{ route('pasien.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                        Tambah Pasien
                    </a>
                    @endif
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Jenis Kelamin</th>
                                <th class="px-4 py-2">Tanggal Lahir</th>
                                <th class="px-4 py-2">No.HP</th>
                                <th class="px-4 py-2">Diagnosa</th>

                                {{-- <th class="px-4 py-2" colspan="2">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasienList as $pasien)
                                <tr class="border-b border-gray-600">
                                    <td class="px-4 py-2">{{ $pasien->namapasien }}</td>
                                    <td class="px-4 py-2">{{ $pasien->jeniskelamin }}</td>
                                    <td class="px-4 py-2">{{ $pasien->tanggal_lahir }}</td>
                                    <td class="px-4 py-2">{{ $pasien->nohp }}</td>
                                    <td class="px-4 py-2">{{ $pasien->diagnosa }}</td>                                   
                                    <td class="px-4 py-2">

                                        @if (Auth::user()->role === 'dokter')
                                            <a href="{{ route('diagnosa.create', ['pasien' => $pasien->id]) }}"
                                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                                                Tambah Diagnosa
                                            </a>
                                        @elseif (Auth::user()->role === 'perawat')
                                            <a href="{{ route('sistolik.create', ['pasien' => $pasien->id]) }}"
                                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                                                BB & Tekanan Darah
                                            </a>
                                        @elseif (Auth::user()->role === 'registrasi')
                                            <a href="{{ route('pasien.create', ['pasien' => $pasien->id]) }}"
                                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                                                Edit
                                            </a>
                                        @elseif (Auth::user()->role === 'apoteker')
                                            <a href="{{ route('resep.create', ['pasien' => $pasien->id]) }}"
                                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                                                Tambah Obat
                                            </a>                                            
                                        @else
                                            <span class="text-sm text-gray-400">Tidak ada akses</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('pasien.hasil', ['pasien' => $pasien->id]) }}"
                                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                                            Hasil Pemeriksaan
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
