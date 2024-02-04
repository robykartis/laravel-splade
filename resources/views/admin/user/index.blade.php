<x-app-layout>
    @seoTitle($title)
    @seoDescription('usermanagement')
    @seoKeywords('laravel')
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <div class="grid grid-cols-1">
            <!-- Kolom 1 -->
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow">
                <h5 class="mb-2 text-2xl font-bold text-gray-900 mb-4">Kolom Pertama</h5>
                <x-splade-table :for="$users" pagination-scroll="head" striped>
                    @cell('action', $user)
                        <Link href="{{ route('users.show', $user) }}"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 ">
                        Lihat
                        </Link>
                    @endcell
                    @cell('created_at', $user)
                        {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}
                    @endcell

                </x-splade-table>
            </div>

        </div>
    </div>

</x-app-layout>
