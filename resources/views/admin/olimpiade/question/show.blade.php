<div id="show-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 id="header" class="text-xl font-semibold text-gray-900 dark:text-white">
                    Pertanyaan 1
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="show-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div id="question"
                    class="[&_ol]:list-decimal [&_ol]:ms-4 [&_*]:text-wrap [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_*]:mb-2">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt quae earum quam. Unde, cum alias!
                </div>
                <ul class="flex flex-col gap-2 [&_li]:flex [&_li]:items-center">
                    <li id="answer1"
                        class=" [&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4 [&_*]:text-wrap [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_*]:mb-2">
                        a. Lorem ipsum dolor sit amet.</li>
                    <li id="answer2"
                        class=" [&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4 [&_*]:text-wrap [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_*]:mb-2">
                        b. Lorem ipsum dolor sit amet.</li>
                    <li id="answer3"
                        class=" [&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4 [&_*]:text-wrap [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_*]:mb-2">
                        c. Lorem ipsum dolor sit amet.</li>
                    <li id="answer4"
                        class=" [&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4 [&_*]:text-wrap [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_*]:mb-2">
                        d. Lorem ipsum dolor sit amet.</li>
                </ul>
            </div>
            <!-- Modal footer -->
            <div
                class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-target="edit-modal" data-modal-toggle="edit-modal" data-modal-hide="show-modal"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 flex items-center">
                    <svg class="w-5 h-5 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                    </svg>
                    Edit</button>
                <a href="{{ route('olimpiade.destroy', $olimpiade->id) }}"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 flex items-center">
                    <svg class="w-5 h-5 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                    Hapus</a>
            </div>
        </div>
    </div>
</div>
