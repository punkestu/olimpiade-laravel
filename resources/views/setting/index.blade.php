<x-layout>
    <x:slot name="title">
        Setting
    </x:slot>
    <main class="p-4 sm:ml-64">
        <div class="mt-4 bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Setting</h3>
                <p class="mt-1 max-w
                -2xl text-sm text-gray-500">Atur akun</p>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:place-items-center sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 place-self-start">
                            <h2 class="text-lg font-semibold text-gray-900">Ubah Password</h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Ubah password akun</p>
                        </dt>
                        <dd class="mt-4 sm:mt-1 text-sm text-gray-900 sm:col-span-2">
                            <a href="{{ route('setting.change-password') }}"
                                class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Ubah
                                Password</a>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </main>

    @include('components.success')
</x-layout>
