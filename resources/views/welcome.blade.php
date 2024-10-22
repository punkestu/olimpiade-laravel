<x-layout>
    <x-slot:title>Welcome</x-slot:title>

    <main class="py-4">
        <section class="px-8 flex items-center gap-8">
            <div class="flex-grow h-[80vh] flex justify-center items-center">
                <img src="/image/background/dashboard.jpg" alt="dashboard image"
                    class="opacity-50 object-cover w-full h-full rounded-md">
            </div>
            <form method="POST" action="{{ route('login.action') }}" class="mx-auto hidden md:block w-[25vw]">
                @csrf
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Login</h5>
                </a>
                <div class="mb-5">
                    <label for="text"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                    <input type="text" id="login_id" name="login_id"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="ASD***" required />
                </div>
                <div class="mb-5">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" name="password"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="********" required />
                </div>
                <button type="submit"
                    class="w-full flex justify-center items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
                <div class="w-full flex justify-center mt-2">
                    <p>or <a href="{{ route('register') }}"
                            class="text-blue-600 hover:underline dark:text-blue-500">Register</a>
                    </p>
                </div>
            </form>
        </section>
    </main>
</x-layout>
