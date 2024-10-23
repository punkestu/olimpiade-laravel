<x-layout>
    <x-slot:title>Peserta</x-slot:title>
    <main class="p-4 sm:ml-64">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Ganti Password</h1>
        </div>
        <div class="mt-4 bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Peserta</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Ganti password peserta</p>
            </div>
            <form action="{{ route('setting.update-password') }}" method="POST">
                @csrf
                <div class="border-t border-gray-200 dark:border-gray-700">
                    <dl>
                        <div
                            class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                            <dt class="text-sm font-medium text-gray-500">Password Lama</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="password" name="current_password" id="current_password"
                                    class="block w-full px-3 py-2.5 mt-1 text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:border-blue-300 sm:text-sm"
                                    required>
                            </dd>
                        </div>
                        <div
                            class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                            <dt class="text-sm font-medium text-gray-500">Password Baru</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="password" name="new_password" id="new_password"
                                    class="block w-full px-3 py-2.5 mt-1 text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:border-blue-300 sm:text-sm"
                                    required>
                            </dd>
                        </div>
                        <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Masukan Ulang Password Baru</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="password" name="confirm_password" id="confirm_password"
                                    class="block w-full px-3 py-2.5 mt-1 text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:border-blue-300 sm:text-sm"
                                    required>
                        </div>
                    </dl>
                </div>
                <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 text-right sm:px-6">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </main>

    @include('components.errors')
</x-layout>
