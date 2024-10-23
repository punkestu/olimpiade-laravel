<x-layout>
    <x-slot:title>Olimpiade</x-slot:title>
    <main class="p-4 sm:ml-64">
        <div class="w-full h-[30vh]">
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $olimpiade->image) }}"
                alt="{{ $olimpiade->name }}">
        </div>
        <h1 class="mt-2 text-5xl font-bold">{{ $olimpiade->name }}</h1>
        <div class="mt-2 flex gap-2 px-2 py-1 bg-slate-200 w-fit rounded-md">
            <p class="font-semibold">{{ $olimpiade->start_date->format("d F Y H:i") }}</span></p>
            <p>-</p>
            <p class="font-semibold">{{ $olimpiade->end_date->format("d F Y H:i") }}</p>
        </div>
        <div class="mt-2 [&_ul]:pl-4 [&_ul]:list-disc [&_ol]:pl-4 [&_ol]:list-decimal">
            {!! $olimpiade->description !!}
        </div>
        <div class="mt-6 relative">
            <div class="pb-4 flex flex-col md:flex-row justify-between items-end gap-2">
                <div class="bg-white dark:bg-gray-900 w-full md:w-auto">
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
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items" onkeyup="searchQuestion(this)">
                    </div>
                </div>
                <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                    class="flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="w-5 h-5 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Soal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kunci Jawaban
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Poin
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($olimpiade->questions as $question)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="max-h-[3.5rem] overflow-y-hidden">
                                        {!! $question->question !!}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ ['a', 'b', 'c', 'd'][$question->correct_answer - 1] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $question->poin }}
                                </td>
                                <td class="px-6 py-4 text-right flex justify-center gap-2">
                                    <button onclick='setQuestion({{ $loop->iteration }}, @json($question))'
                                        data-modal-target="show-modal" data-modal-toggle="show-modal"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center text-center">
                                        <svg class="w-5 h-5 text-white dark:text-gray-800 md:block hidden" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        Detail</button>
                                    <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                        onclick='setQuestion({{ $loop->iteration }}, @json($question))'
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 flex items-center text-center">
                                        <svg class="w-5 h-5 text-white dark:text-gray-800 md:block hidden" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                        Edit</button>
                                    <button data-modal-target="confirmation-modal"
                                        data-modal-toggle="confirmation-modal"
                                        onclick="setDeleteUrl({{ $question->id }})"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 flex items-center text-center">
                                        <svg class="w-5 h-5 text-white dark:text-gray-800 md:block hidden" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                        Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (count($olimpiade->questions) == 0)
                <div class="flex items-center justify-center h-96">
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Tidak ada data</h2>
                        <p class="text-gray-500 dark:text-gray-400">Data soal tidak ditemukan</p>
                    </div>
                </div>
            @endif
        </div>
    </main>

    <div id="confirmation-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="confirmation-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Yakin ingin hapus soal ini?
                    </h3>
                    <p class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">(tidak bisa dikembalikan)
                    </p>
                    <a
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Tetap Hapus
                    </a>
                    <button data-modal-hide="confirmation-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </div>
        </div>
    </div>


    @include('admin.olimpiade.question.create', ['olimpiade_id' => $olimpiade->id])
    @if (count($olimpiade->questions) > 0)
        @include('admin.olimpiade.question.show')
        @include('admin.olimpiade.question.edit')
    @endif
    @include('components.errors')
    <script>
        function setDeleteUrl(id) {
            const confirmationModal = document.getElementById('confirmation-modal');
            confirmationModal.querySelector('a').href = `/question/${id}/delete`;
        }

        function setQuestion(index, data) {
            const showModal = document.getElementById('show-modal');
            const editModal = document.getElementById('edit-modal');

            showModal.querySelector('#header').innerHTML = `Pertanyaan ${index} (${data.poin})`;
            showModal.querySelector('#question').innerHTML = data.question;
            showModal.querySelector('#answer1').innerHTML = `a. ${data.answer1}`;
            showModal.querySelector('#answer2').innerHTML = `b. ${data.answer2}`;
            showModal.querySelector('#answer3').innerHTML = `c. ${data.answer3}`;
            showModal.querySelector('#answer4').innerHTML = `d. ${data.answer4}`;
            [1, 2, 3, 4].forEach((i) => {
                showModal.querySelector(`#answer${i}`).classList.remove('bg-green-200');
            })
            showModal.querySelector(`#answer${data.correct_answer}`).classList.add('bg-green-200');

            editModal.querySelector('form').action = `/question/${data.id}/update`;
            editModal.querySelector('[name=question]').value = data.question;
            editModal.querySelector('[name=answer1]').value = data.answer1;
            editModal.querySelector('[name=answer2]').value = data.answer2;
            editModal.querySelector('[name=answer3]').value = data.answer3;
            editModal.querySelector('[name=answer4]').value = data.answer4;
            editModal.querySelector(`#correct_answer${data.correct_answer}`).checked = true;
            editModal.querySelector('[name=poin]').value = data.poin;
            ['[name=question]', '[name=answer1]', '[name=answer2]', '[name=answer3]', '[name=answer4]'].forEach(query => {
                editModal.querySelector(query).dispatchEvent(new window.Event('change', {
                    bubbles: true
                }));
            });
        }

        function searchQuestion(searchInput) {
            const rows = document.querySelectorAll('tbody tr');
            const query = searchInput.value.trim().toLowerCase();
            rows.forEach(row => {
                const question = row.children[1].textContent.trim().toLowerCase();
                if (question.includes(query)) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if (session('modal') === 'create-question')
                setTimeout(() => {
                    document.querySelector('[data-modal-target="create-modal"]').click();
                }, 500);
            @endif
            @if (session('modal') === 'edit-question')
                setTimeout(() => {
                    document.querySelector('[data-modal-target="edit-modal"]').click();

                    const editModal = document.getElementById('edit-modal');
                    editModal.querySelector('form').action =
                        `/question/{{ session('question_id') }}/update`;
                    editModal.querySelector('[name=question]').value = '{!! old('question') !!}';
                    editModal.querySelector('[name=answer1]').value = '{!! old('answer1') !!}';
                    editModal.querySelector('[name=answer2]').value = '{!! old('answer2') !!}';
                    editModal.querySelector('[name=answer3]').value = '{!! old('answer3') !!}';
                    editModal.querySelector('[name=answer4]').value = '{!! old('answer4') !!}';
                    editModal.querySelector(`#correct_answer{{ old('correct_answer') }}`).checked =
                        true;
                    editModal.querySelector('[name=poin]').value = {{ old('poin') ?? 0 }};
                    ['[name=question]', '[name=answer1]', '[name=answer2]', '[name=answer3]',
                        '[name=answer4]'
                    ].forEach(query => {
                        editModal.querySelector(query).dispatchEvent(new window.Event('change', {
                            bubbles: true
                        }));
                    });
                }, 500);
            @endif
        });
    </script>
</x-layout>
