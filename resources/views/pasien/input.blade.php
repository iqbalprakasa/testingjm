<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Form Pasien</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8">
        <h2 class="text-xl font-semibold mb-4">Data Pasien</h2>

        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $pasien->id ?? '' }}">
            <div class="mb-4">
                <label class="block text-gray-700">Nama Pasien</label>
                <input type="text"   name="namapasien" value="{{ $pasien->namapasien ?? ''}}" class="w-full border border-gray-300 rounded px-3 py-2">    
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Jenis Kelamin</label>
                <select id="jeniskelamin" name="jeniskelamin" required
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                   
                    <option value="laki-laki" {{ $pasien->jeniskelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="perempuan" {{ $pasien->jeniskelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                @php
                    $tanggal = old('tanggal_lahir', isset($pasien->tanggal_lahir) ? \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('Y-m-d') : '');
                @endphp
                <label for="tanggal_lahir" class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ $tanggal}}">
            </div>
            
            <div class="mb-4">
                <label for="nohp" class="block text-gray-700 font-medium mb-2">Nomor HP</label>
                <input type="tel" name="nohp" id="nohp"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="08xxxxxxxxxx"
                       pattern="[0-9]{10,15}"
                       value="{{ $pasien->nohp ?? ''}}">
            </div>
            
            
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
            <button onclick="window.history.back();"
   class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
    ← Kembali
</button>
        </form>
    </div>
</x-app-layout>
