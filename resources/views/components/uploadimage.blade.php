<div id="{{ $name }}-image-modal" tabindex="-1" aria-hidden="true"
    class="{{ $name }}-image-modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Upload Foto
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="{{ $name }}-image-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image">Upload file</label>
                        <div class="flex gap-2">
                            <input
                                class="block flex-grow text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="image" type="file" accept=".jpeg,.png,.jpg">
                            <button type="button"
                                class="aspect-square text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-1 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                onclick="uploadImage()"><svg class="w-6 h-6 text-white dark:text-gray-800"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div id="image-container" class="max-h-[30vh] overflow-y-auto grid grid-cols-4 gap-2">
                            @foreach ($images as $image)
                                <div class="aspect-square">
                                    <input type="radio" name="{{ $name }}-image"
                                        id="{{ $name }}-image-{{ $image->id }}" value="{{ $image->path }}"
                                        class="peer/image w-0 h-0 absolute opacity-0">
                                    <label for="{{ $name }}-image-{{ $image->id }}"
                                        class="w-full h-full object-contain peer-checked/image:border-blue-500 block cursor-pointer text-sm text-gray-900 dark:text-white border px-2 py-1 rounded-md">
                                        <img class="w-full h-full object-cover" src="/storage/{{ $image->path }}"
                                            alt="{{ $image->name }}">
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @if (count($images) == 0)
                            <p class="text-center">Belum ada foto</p>
                        @endif
                    </div>
                    <button type="button" id="selectImage" data-modal-hide="{{ $name }}-image-modal"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pilih</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function uploadImage() {
        const tokenRes = await fetch("/api/requesttoken", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: {{ Auth::id() }}
            }),
        }).then(res => res.json());
        const token = tokenRes.data.token;
        const image = document.getElementById('image');
        const formData = new FormData();
        formData.append('image', image.files[0]);
        fetch('/api/image/upload', {
                method: 'POST',
                body: formData,
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            }).then(response => response.json())
            .then(data => {
                alert("Foto berhasil diupload");
                document.querySelectorAll(".images-container").forEach(element => {
                    element.innerHTML += `
                        <div class="aspect-square">
                            <input type="radio" name="image" id="image-${data.id}"
                                value="${data.path}" class="peer/image w-0 h-0 absolute opacity-0">
                            <label for="image-${data.id}"
                                class="w-full h-full object-contain peer-checked/image:border-blue-500 block cursor-pointer text-sm text-gray-900 dark:text-white border px-2 py-1 rounded-md">
                                <img class="w-full h-full object-cover" src="/storage/${data.path}" alt="${data.name}">
                            </label>
                        </div>
                    `;
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
