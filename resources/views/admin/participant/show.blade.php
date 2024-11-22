<x-layout>
    <x-slot:title>Peserta</x-slot:title>
    <main class="p-4 sm:ml-64">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Detail Peserta</h1>
            <a href="{{ route('participant.change-password', $participant) }}"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 flex items-center">
                <svg class="w-5 h-5 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                </svg>
                Ganti Password
            </a>
        </div>
        <div class="mt-4 bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Peserta</h3>
                <p class="mt-1 max-w
                -2xl text-sm text-gray-500">Detail informasi peserta</p>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700">
                <dl>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Nama</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $participant->name }}</dd>
                    </div>
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">ID</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $participant->login_id }}</dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Olimpiade</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $participant->olimpiade->name }}</dd>
                    </div>
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Asal Sekolah</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $participant->asal_sekolah ?? '-' }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Kelas</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $participant->kelas }}</dd>
                    </div>
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Nilai</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                            {{ $participant->point->sum('poin') - $participant->minusPoint->count() }}</dd>
                    </div>
                </dl>
            </div>
        </div>
        <h1 class="mt-4">List Jawaban</h1>
        <div class="grid grid-cols-6 md:grid-cols-8 xl:grid-cols-10 2xl:grid-cols-12 gap-2 mt-2">
            @foreach ($questions as $question)
                @php
                    $correct = $question->answer && $question->answer->answer == $question->correct_answer;
                @endphp
                <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 flex flex-col items-center {{ $correct ? 'bg-blue-500' : '' }}">
                        <h3 class="text-lg font-medium leading-6 {{ $correct ? 'text-white' : 'text-gray-900' }}">
                            {{ $loop->iteration }}</h3>
                        <p class="mt-1 max-w-2xl text-sm {{ $correct ? 'text-white' : 'text-gray-500' }}">
                            {{ $question->answer ? ['', 'A', 'B', 'C', 'D'][$question->answer->answer] : '-' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>
