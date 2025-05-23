<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Form Perawat</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8">
        <h2 class="text-xl font-semibold mb-4">Form Pasien</h2>

        <form action="{{ route('sistolik') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $pasien->id ?? '' }}">
            <div class="mb-4">
                <label class="block text-gray-700">Nama Pasien</label>
                <input type="text" name="namapasien" value="{{ $pasien->namapasien }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Berat Badan</label>
                <input type="text" name="beratbadan" value="{{ $pasien->beratbadan }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tekanan Darah</label>
                <input type="text" name="tekanandarah" value="{{ $pasien->tekanandarah }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
            <button onclick="window.location.href='/dashboard';"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                ← Kembali
            </button>
        </form>
    </div>
</x-app-layout>
