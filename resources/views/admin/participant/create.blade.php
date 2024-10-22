<x-layout>
    <x-slot:title>Peserta</x-slot:title>
    <main class="p-4 sm:ml-64">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Tambah Peserta</h1>
        </div>
        <div class="mt-4 bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Peserta</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Tambah peserta baru</p>
            </div>
            <form action="{{ route('participant.store') }}" method="POST">
                @csrf
                <div class="border-t border-gray-200 dark:border-gray-700">
                    <dl>
                        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 flex items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Nama</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="text" name="name" id="name"
                                    class="block w-full px-3 py-2.5 mt-1 text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:border-blue-300 sm:text-sm"
                                    required>
                            </dd>
                        </div>
                        <div class="bg-white dark:bg-gray-800 px-4 py-5 flex items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="email" name="email" id="email"
                                    class="block w-full px-3 py-2.5 mt-1 text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:border-blue-300 sm:text-sm"
                                    required>
                            </dd>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 flex items-center sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Olimpiade</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 flex gap-2 items-center">
                                <input type="hidden" name="olimpiade_id" value="">
                                <p id="kategori-display" class="flex-grow hidden text-gray-900 dark:text-white"></p>
                                <button type="button" id="pilih-kategori" data-modal-target="select-modal"
                                    data-modal-toggle="select-modal"
                                    class="flex-grow text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pilih
                                    Kategori</button>
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="px-4 py-3 bg-white dark:bg-gray-800 text-right sm:px-6">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </main>
    <div id="select-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Daftar Kategori Olimpiade
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="select-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <p class="text-gray-500 dark:text-gray-400 mb-4">Pilih Kategori:</p>
                    <ul class="space-y-4 mb-4">
                        @foreach ($olimpiades as $olimpiade)
                            <li>
                                <button type="button" onclick="setOlimpiade({{ json_encode($olimpiade) }})"
                                    data-modal-toggle="select-modal"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $olimpiade->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setOlimpiade(olimpiade) {
            document.querySelector('input[name="olimpiade_id"]').value = olimpiade.id;
            document.querySelector('#kategori-display').classList.remove('hidden');
            document.querySelector('#kategori-display').innerText = olimpiade.name;
            document.querySelector('#pilih-kategori').innerText = 'Ubah Kategori';
        }
    </script>
</x-layout>
