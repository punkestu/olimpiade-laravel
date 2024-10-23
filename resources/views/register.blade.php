<x-layout>
    <x-slot:title>Register</x-slot:title>

    <main class="w-full min-h-[100vh] flex items-center justify-center">
        @if (count($categories) > 0)
            <div
                class="xl:w-[40vw] md:w-[70vw] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <form method="POST" action="{{ route('register.action') }}" class="max-w-md mx-auto">
                    @csrf
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Register</h5>
                    </a>
                    <div class="mb-5">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <input type="hidden" name="category" value="{{ old('category') }}">
                        <div class="{{ old('category') ? 'hidden' : 'flex' }} gap-2" id="select-olimpiade">
                            @for ($i = 0; $i < (count($categories) >= 2 ? 2 : 1); $i++)
                                <button type="button" onclick="setCategory({{ json_encode($categories[$i]) }})"
                                    class="flex gap-2 justify-center items-center flex-grow border-2 hover:bg-slate-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    {{ $categories[$i]->name }}</button>
                            @endfor
                            @if (count($categories) > 2)
                                <button type="button" data-modal-target="select-modal" data-modal-toggle="select-modal"
                                    class="flex-grow text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kategori
                                    Lain</button>
                            @endif
                        </div>
                        <div class="{{ old('category') ? 'flex' : 'hidden' }} gap-2" id="selected-olimpiade">
                            <h2
                                class="flex-grow text-center border-2 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center gap-2 justify-center">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                        clip-rule="evenodd" />
                                </svg>
                                @if (old('category'))
                                    @php
                                        $key = array_search(old('category'), array_column($categories->toArray(), 'id'));
                                    @endphp
                                @endif
                                <span>{{ old('category') ? $categories[$key]->name : '' }}</span>
                            </h2>
                            <button type="button" onclick="resetCategory()"><svg
                                    class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Peserta Olimpiade" required value="{{ old('name') }}" />
                    </div>
                    <div class="mb-5">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="peserta@gmail.com" required value="{{ old('email') }}" />
                    </div>
                    <div class="mb-5">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="********" required />
                    </div>

                    <div class="mb-5">
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                            Password</label>
                        <input type="password" id="password-confirmation" name="password-confirmation"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="********" required />
                    </div>
                    <button type="submit"
                        class="w-full flex justify-center items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                    <div class="w-full flex justify-center mt-2">
                        <p>or <a href="{{ route('login') }}"
                                class="text-blue-600 hover:underline dark:text-blue-500">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        @else
            <div
                class="xl:w-[40vw] md:w-[70vw] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Register</h5>
                <p class="mb-2 text-gray-500 dark:text-gray-400">Tidak ada kategori olimpiade yang tersedia.</p>
                <a href="/"
                    class="w-full flex justify-center items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
            </div>
        @endif
    </main>

    @if (count($categories) > 2)
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
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <p class="text-gray-500 dark:text-gray-400 mb-4">Pilih Kategori:</p>
                        <ul class="space-y-4 mb-4">
                            @foreach ($categories as $category)
                                <li>
                                    <button type="button" onclick="setCategory({{ json_encode($category) }})"
                                        data-modal-toggle="select-modal"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $category->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('components.errors')

    <script>
        function setCategory(category) {
            document.querySelector('input[name="category"]').value = category["id"];
            document.getElementById('select-olimpiade').classList.add('hidden');
            document.getElementById('selected-olimpiade').classList.remove('hidden');
            document.getElementById('select-olimpiade').classList.remove('flex');
            document.getElementById('selected-olimpiade').classList.add('flex');
            document.querySelector('#selected-olimpiade > h2 > span').innerText = category["name"];
        }

        function resetCategory() {
            document.querySelector('input[name="category"]').value = '';
            document.getElementById('select-olimpiade').classList.remove('hidden');
            document.getElementById('selected-olimpiade').classList.add('hidden');
            document.getElementById('select-olimpiade').classList.add('flex');
            document.getElementById('selected-olimpiade').classList.remove('flex');
        }
    </script>
</x-layout>
