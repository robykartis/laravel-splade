<x-app-layout>
    @seoTitle($title)
    @seoDescription('usermanagement')
    @seoKeywords('laravel')
    <x-slot name="header">
        {{ __('Show') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="grid grid-cols-1">
            <!-- Kolom 1 -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Kolom Pertama</h5>
                <ul>
                    <li>{{ $user->name }}</li>
                    <li>{{ $user->email }}</li>
                    <li>{{ $user->pengguna }}</li>
                </ul>
                <div class="p-4">
                    <Link href="{{ route('users.index') }}"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 ">
                    Kembali</link>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
