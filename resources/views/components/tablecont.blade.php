<div id="{{ $name }}-table-modal" tabindex="-1" aria-hidden="true"
    class="{{ $name }}-table-modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tabel
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="{{ $name }}-table-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div class="flex flex-wrap gap-2">
                    <button id="add-table" type="button" data-modal-hide="{{ $name }}-table-modal"
                        class="border bg-gray-200">Buat
                        Tabel</button>
                    <button id="add-column" type="button" data-modal-hide="{{ $name }}-table-modal"
                        class="border bg-gray-200">Tambah
                        Kolom</button>
                    <button id="del-column" type="button" data-modal-hide="{{ $name }}-table-modal"
                        class="border bg-gray-200">Hapus
                        Kolom</button>
                    <button id="add-row" type="button" data-modal-hide="{{ $name }}-table-modal"
                        class="border bg-gray-200">Tambah
                        Baris</button>
                    <button id="del-row" type="button" data-modal-hide="{{ $name }}-table-modal"
                        class="border bg-gray-200">Hapus
                        Baris</button>
                </div>
            </div>
        </div>
    </div>
</div>
