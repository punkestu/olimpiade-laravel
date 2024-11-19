<x-layout>
    <x-slot:title>Olimpiade</x-slot:title>
    <main class="p-4 sm:ml-64">
        <div class="relative">
            <div class="pb-4 flex flex-col md:flex-row justify-between items-end gap-2">
                <div class="bg-white dark:bg-gray-900 w-full md:w-auto">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items" onkeyup="searchOlimpiade(this)">
                    </div>
                </div>
                <a href="{{ route('olimpiade.create') }}"
                    class="flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="w-5 h-5 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Mulai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Peserta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($olimpiades as $olimpiade)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $olimpiade->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $olimpiade->start_date->format('d F Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $olimpiade->participants->count() }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($now->gt($olimpiade->end_date))
                                        <span
                                            class="text-center inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100">
                                            Selesai
                                        </span>
                                    @elseif (now()->lt($olimpiade->start_date))
                                        <span
                                            class="text-center inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100">
                                            Belum Dimulai
                                        </span>
                                    @else
                                        <span
                                            class="text-center inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100">
                                            Berlangsung
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right flex justify-center gap-2">
                                    <a href="{{ route('olimpiade.show', $olimpiade->id) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center text-center">
                                        <svg class="w-5 h-5 text-white dark:text-gray-800 xl:block hidden"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        Detail</a>
                                    <button id="{{ $olimpiade->id }}-dropdown-button"
                                        data-dropdown-toggle="{{ $olimpiade->id }}-dropdown"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center text-center"
                                        type="button">Lainnya <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>

                                    <div id="{{ $olimpiade->id }}-dropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ $olimpiade->id }}-dropdown-button">
                                            <li>
                                                <a href="https://meet.jit.si/vpaas-magic-cookie-5be5eb5971044a0b90dc1fa63a382948/{{ $olimpiade->slug }}-olimpiade12345"
                                                    class="text-start w-full block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Monitor Kamera</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('olimpiade.edit', $olimpiade->id) }}"
                                                    class="text-start w-full block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('olimpiade.delete', $olimpiade->id) }}"
                                                    class="text-start w-full block px-4 py-2
                                                    text-red-600 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (count($olimpiades) == 0)
                <div class="flex items-center justify-center h-96">
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Tidak ada data</h2>
                        <p class="text-gray-500 dark:text-gray-400">Data olimpiade tidak ditemukan</p>
                    </div>
                </div>
            @endif
        </div>
    </main>
    @include('components.success')
    <script>
        function searchOlimpiade(searchInput) {
            const rows = document.querySelectorAll('tbody tr');
            const query = searchInput.value.trim().toLowerCase();
            rows.forEach(row => {
                const olimpiade = row.children[0].textContent.trim().toLowerCase();
                if (olimpiade.includes(query)) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }
    </script>
</x-layout>
