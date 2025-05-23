<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Form Pasien</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-6xl mx-auto mt-8">
                    <h2 class="text-xl font-semibold mb-4">Data Pasien</h2> 

                        <input type="hidden" name="id" value="{{ $pasien->id ?? '' }}">
                        <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <th class="w-48 py-2 px-4 text-gray-500 font-medium">Nama Pasien:</th>
                                    <td class="py-2 px-4 text-gray-900">{{ $pasien->namapasien ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="w-48 py-2 px-4 text-gray-500 font-medium">Jenis Kelamin:</th>
                                    <td class="py-2 px-4 text-gray-900">{{ ucfirst($pasien->jeniskelamin ?? '-') }}</td>
                                </tr>
                                <tr>
                                    <th class="w-48 py-2 px-4 text-gray-500 font-medium">Tanggal Lahir:</th>
                                    <td class="py-2 px-4 text-gray-900">
                                        {{ \Carbon\Carbon::parse($pasien->tanggal_lahir ?? '')->format('d M Y') ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w-48 py-2 px-4 text-gray-500 font-medium">Nomor HP:</th>
                                    <td class="py-2 px-4 text-gray-900">{{ $pasien->nohp ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="w-48 py-2 px-4 text-gray-500 font-medium">Diagnosa:</th>
                                    <td class="py-2 px-4 text-gray-900">{{ $pasien->diagnosa ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <h2 class="text-xl font-semibold mb-4">Data Resep</h2>

                        <div class="mb-4">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Nama Obat</th>
                                        <th class="px-4 py-2">Harga</th>
                                        <th class="px-4 py-2">Jumlah</th>
                                        <th class="px-4 py-2">Total</th>
                                        <th class="px-4 py-2">Keterangan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resepList as $resep)
                                        <tr class="border-b border-gray-600">
                                            <td class="px-4 py-2">{{ $resep->namaobat }}</td>
                                            <td class="px-4 py-2">Rp {{ number_format($resep->harga, 0, ',', '.') }}
                                            </td>
                                            <td class="px-4 py-2">{{ $resep->jumlah }}</td>
                                            <td class="px-4 py-2">Rp
                                                {{ number_format($resep->harga * $resep->jumlah, 0, ',', '.') }}
                                            </td>
                                            <td class="px-4 py-2">{{ $resep->keterangan }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        <div class="text-right">
                            <button onclick="window.location.href='/dashboard';"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                ← Kembali
                            </button>
                        </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
