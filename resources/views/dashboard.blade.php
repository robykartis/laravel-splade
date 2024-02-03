<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <!-- Kolom 1 -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Kolom Pertama</h5>
                <input type="text"
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                <p class="text-gray-700">Isi konten untuk kolom pertama.</p>
            </div>
            <!-- Kolom 2 -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Kolom Kedua</h5>
                <p class="text-gray-700">Isi konten untuk kolom kedua.</p>
            </div>
            <!-- Kolom 3 -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Kolom Kedua</h5>
                <p class="text-gray-700">Isi konten untuk kolom kedua.</p>
            </div>
            <!-- Kolom 4 -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Kolom Kedua</h5>
                <p class="text-gray-700">Isi konten untuk kolom kedua.</p>
            </div>
        </div>


    </div>

</x-app-layout>
