<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Master Obat</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8"> 

        <form action="{{ route('obat.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $obat->id ?? '' }}">
            <div class="mb-4">
                <label class="block text-gray-700">Nama obat</label>
                <input type="text"   name="namaobat" value="{{ $obat->namaobat ?? ''}}" class="w-full border border-gray-300 rounded px-3 py-2">    
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-gray-700 font-medium mb-2">Harga</label>
                <div class="flex rounded shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l border border-r-0 border-gray-300 bg-gray-100 text-gray-700 text-sm">
                        Rp
                    </span>
                    <input type="number" name="harga" id="harga"
                           value="{{ old('harga', $obat->harga ?? '') }}"
                           class="w-full border border-gray-300 rounded-r px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
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
