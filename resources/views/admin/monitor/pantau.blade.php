<x-layout>
    <x-slot:title>Monitor</x-slot:title>
    <main class="p-4 sm:ml-64">
        <div class="relative mb-4">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                {{ $summary->user->login_id }}
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $summary->user->olimpiade->name }}
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $summary->is_focus ? 'Focus' : 'Not Focus' }}
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $summary->is_fullscreen ? 'Fullscreen' : 'Not Fullscreen' }}
            </p>
        </div>
        <div class="relative">
            <div class="pb-4 flex justify-between items-end">
                <div class="bg-white dark:bg-gray-900">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items" onkeyup="searchOlimpiade(this)">
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Olimpiade
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Code
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kondisi
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Data tambahan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($monitor as $item)
                            <tr>
                                <td class="px-6 py-3">
                                    {{ $item->user->login_id }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $item->user->olimpiade->name }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $item->code }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $item->message }}
                                </td>
                                <td class="px-6 py-3 text-center flex gap-2 justify-center">
                                    {{ $item->data ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (count($monitor) == 0)
                <div class="flex items-center justify-center h-96">
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Tidak ada data</h2>
                        <p class="text-gray-500 dark:text-gray-400">Data peserta tidak ditemukan</p>
                    </div>
                </div>
            @else
                <div class="flex justify-end">
                    @if ($offset > 0)
                        <a href="{{ route('monitor.pantau', ['id' => $summary->user_id, 'offset' => $offset - 1]) }}"
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Previous
                        </a>
                    @endif

                    <!-- Next Button -->
                    <a href="{{ route('monitor.pantau', ['id' => $summary->user_id, 'offset' => $offset + 1]) }}"
                        class="flex items-center justify-center px-3 h-8 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                    </a>
                </div>
            @endif
        </div>
    </main>
</x-layout>
