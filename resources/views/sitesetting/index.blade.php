<x-layout>
    <x:slot name="title">
        Site Setting
    </x:slot>
    <main class="p-4 sm:ml-64">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Pengaturan Situs</h1>
        </div>
        <div class="mt-4 bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Dasar</h3>
                {{-- <p class="mt-1 max-w-2xl text-sm text-gray-500">Ganti password peserta</p> --}}
            </div>
            <form action="{{ route('sitesetting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="border-t border-gray-200 dark:border-gray-700">
                    <dl>
                        <div
                            class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                            <dt class="text-sm font-medium text-gray-500">Judul Situs</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input type="text" name="olimpiade_name" id="olimpiade_name"
                                    class="block w-full px-3 py-2.5 mt-1 text-gray-900 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-300 focus:border-blue-300 sm:text-sm"
                                    value="{{ $site_settings->olimpiade_name }}">
                            </dd>
                        </div>
                        <div
                            class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                            <dt class="text-sm font-medium text-gray-500">Logo Situs</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    name="olimpiade_logo" id="olimpiade_logo" type="file" accept=".jpg,.png,.jpeg,.svg">
                            </dd>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                            <dt class="text-sm font-medium text-gray-500">Logo Loading</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    name="olimpiade_loadinglogo" id="olimpiade_loadinglogo" type="file" accept=".jpg,.png,.jpeg,.gif,.svg">
                            </dd>
                        </div>
                        <div
                            class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 items-center">
                            <dt class="text-sm font-medium text-gray-500">Banner</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    name="olimpiade_banner" id="olimpiade_banner" type="file" accept=".jpg,.png,.jpeg,.svg">
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="px-4 py-3 bg-white dark:bg-gray-800 text-right sm:px-6">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </main>

    @include('components.success')
    @include('components.errors')
</x-layout>
