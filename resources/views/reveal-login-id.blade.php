<x-layout>
    <x-slot:title>Welcome</x-slot:title>

    <main class="py-4 flex flex-col gap-4 justify-center items-center h-[80vh]">
        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">ID: {{ $id }}
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">ID untuk login juga akan dikirimkan ke email
                yang telah didaftarkan</p>
            <a href="{{ route('login') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
        </div>
    </main>
</x-layout>
