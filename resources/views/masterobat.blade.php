<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Daftar Obat</h3>
                    <a href="{{ route('obat.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                         Tambah Obat
                     </a>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama Obat</th>
                                <th class="px-4 py-2">Harga</th>
                                <th class="px-4 py-2" colspan="3">Aksi</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obatList as $obat)
                                <tr class="border-b border-gray-600">
                                    <td class="px-4 py-2">{{ $obat->namaobat }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                   
                                    <td>
                                        <a href="{{ route('obat.create', ['obat' => $obat->id]) }}"
                                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                                             Edit
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
