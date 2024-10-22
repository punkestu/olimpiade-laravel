<div id="drawer-navigation"
    class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
        Daftar Soal</h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="grid grid-cols-4 gap-2">
            @foreach ($questions as $question)
                <label for="question-num-drawer-{{ $question->id }}"
                    class="aspect-square border focus:ring-4 font-medium rounded-lg text-sm">
                    <input type="radio" name="question-num-drawer" id="question-num-drawer-{{ $question->id }}"
                        class="peer/question-num hidden" {{ $loop->index === 0 ? 'checked' : '' }}
                        onchange="changeQuestion({{ $loop->index }})" data-drawer-hide="drawer-navigation"
                        aria-controls="drawer-navigation">
                    <span
                        class="w-full h-full flex items-center justify-center rounded-lg peer-checked/question-num:text-white peer-checked/question-num:bg-blue-700 peer-checked/question-num:hover:bg-blue-800 peer-checked/question-num:dark:bg-blue-600 peer-checked/question-num:dark:hover:bg-blue-700">{{ $loop->iteration }}</span>
                </label>
            @endforeach
        </ul>
    </div>
</div>
