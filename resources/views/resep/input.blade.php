<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Resep Pasien</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="max-w-7xl mx-auto mt-8">
                    <h2 class="text-xl font-semibold mb-4">Data Pasien</h2>

                    <form action="{{ route('resep.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $pasien->id ?? '' }}">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label class="block text-gray-700">Nama Pasien</label>
                                <input type="text" disabled name="namapasien" value="{{ $pasien->namapasien ?? '' }}"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">Jenis Kelamin</label>
                                <select id="jeniskelamin" name="jeniskelamin" disabled
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">

                                    <option value="laki-laki"
                                        {{ $pasien->jeniskelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="perempuan"
                                        {{ $pasien->jeniskelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Diagnosa</label>
                                <input type="text" disabled name="diagnosa" value="{{ $pasien->diagnosa ?? '' }}"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="mb-4">
                                <div class="flex items-center justify-between">
                                    <label for="obat_id" class="block text-gray-700">Jumlah</label>
                                    @error('obat_id')
                                        <span class="text-red-500 text-sm ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <select id="obat_id" name="obat_id" class="tom-select w-full">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($listDataObat as $item)
                                        <option value="{{ $item->id }}" data-harga="{{ $item['harga'] }}"
                                            {{ old('obat_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->namaobat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 " id="harga-container">
                                <label class="block text-gray-700">Harga</label>
                                <input type="text" id="harga" name="harga" readonly
                                    class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Keterangan</label>
                                <input type="text" name="keterangan"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>
                            <div class="mb-4">
                                <div class="flex items-center justify-between">
                                    <label for="jumlah" class="block text-gray-700">Jumlah</label>
                                    @error('jumlah')
                                        <span class="text-red-500 text-sm ml-2">{{ $message }}</span>
                                    @enderror
                                </div>

                                <input type="number" name="jumlah" id="jumlah" min="1"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Total</label>
                                <input type="text" name="total-harga" id="total-harga"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>
                            <div class="mt-6">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Simpan
                                </button>
                            </div>
                            <!-- Untuk field obat_id -->
                            @error('obat_id')
                                <div class="alert alert-danger">pilih obat</div>
                            @enderror


                        </div>

                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nama Obat</th>
                                    <th class="px-4 py-2">Harga</th>
                                    <th class="px-4 py-2">Jumlah</th>
                                    <th class="px-4 py-2">Total</th>
                                    <th class="px-4 py-2">Keterangan</th>
                                    <th class="px-4 py-2" colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resepList as $resep)
                                    <tr class="border-b border-gray-600">
                                        <td class="px-4 py-2">{{ $resep->namaobat }}</td>
                                        <td class="px-4 py-2">Rp {{ number_format($resep->harga, 0, ',', '.') }}</td>
                                        <td class="px-4 py-2">{{ $resep->jumlah }}</td>
                                        <td class="px-4 py-2">Rp {{ number_format($resep->harga*$resep->jumlah, 0, ',', '.') }}</td>                                        
                                        <td class="px-4 py-2">{{ $resep->keterangan }}</td>
                                        
                                        <td>
                                            <div class="text-right">
                                                <button type="button"
                                                    onclick="hapusResep('{{ route('resep.destroy', $resep->id) }}')"
                                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Hapus
                                                </button>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </form>
                    <form id="form-delete-resep" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
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
    <script>
        new TomSelect('.tom-select', {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
        const obatSelect = document.getElementById('obat_id');
        const hargaContainer = document.getElementById('harga-container');
        const hargaInput = document.getElementById('harga');
        const jumlahInput = document.getElementById('jumlah');
        const totalHargaContainer = document.getElementById('total-harga');

        let harga = 0;

        function updateHarga() {
            const selected = obatSelect.options[obatSelect.selectedIndex];
            harga = parseInt(selected.getAttribute('data-harga')) || 0;

            if (harga > 0) {
                hargaContainer.classList.remove('hidden');
                hargaInput.value = 'Rp ' + harga.toLocaleString('id-ID');
                updateTotal();
            } else {
                hargaContainer.classList.add('hidden');
                hargaInput.value = '';
                totalHargaContainer.innerText = 'Rp 0';
            }
        }

        function updateTotal() {
            const jumlah = parseInt(jumlahInput.value) || 0;
            const total = harga * jumlah;
            totalHargaContainer.value = 'Rp ' + total.toLocaleString('id-ID');
        }

        obatSelect.addEventListener('change', updateHarga);
        jumlahInput.addEventListener('input', updateTotal);

        function hapusResep(url) {
            if (confirm('Yakin ingin menghapus resep ini?')) {
                const form = document.getElementById('form-delete-resep');
                form.action = url;
                form.submit();
            }
        }
    </script>

</x-app-layout>
