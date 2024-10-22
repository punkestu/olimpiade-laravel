<div id="edit-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form method="POST" action="" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            @csrf
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Pertanyaan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 max-h-[50vh] overflow-auto">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pertanyaan</label>
                @include('components.richtext', [
                    'name' => 'question',
                    'value' => '',
                    'class' => 'min-h-[10vh] max-h-[20vh]',
                ])
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poin</label>
                <input type="number" name="poin" id="poin" value="" placeholder="0"
                    class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawaban</label>
                <ul class="flex flex-col gap-2">
                    <li class="flex items-center gap-1">
                        <input type="radio" name="correct_answer" id="correct_answer1" value="1">
                        @include('components.richtext', [
                            'name' => 'answer1',
                            'value' => '',
                            'class' => 'min-h-[5vh] max-h-[10vh]',
                        ])
                    </li>
                    <li class="flex items-center gap-1">
                        <input type="radio" name="correct_answer" id="correct_answer2" value="2">
                        @include('components.richtext', [
                            'name' => 'answer2',
                            'value' => '',
                            'class' => 'min-h-[5vh] max-h-[10vh]',
                        ])
                    </li>
                    <li class="flex items-center gap-1">
                        <input type="radio" name="correct_answer" id="correct_answer3" value="3">
                        @include('components.richtext', [
                            'name' => 'answer3',
                            'value' => '',
                            'class' => 'min-h-[5vh] max-h-[10vh]',
                        ])
                    </li>
                    <li class="flex items-center gap-1">
                        <input type="radio" name="correct_answer" id="correct_answer4" value="4">
                        @include('components.richtext', [
                            'name' => 'answer4',
                            'value' => '',
                            'class' => 'min-h-[5vh] max-h-[10vh]',
                        ])
                    </li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div
                class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center">
                    Simpan</but>
            </div>
        </form>
    </div>
</div>
