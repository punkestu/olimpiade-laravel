<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <button data-modal-target="tata-cara-modal" data-modal-toggle="tata-cara-modal"
        class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Toggle modal
    </button>
    <div id="tata-cara-modal" tabindex="-1" aria-hidden="true"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        PETUNJUK PENGERJAAN SOAL BABAK PENYISIHAN
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="tata-cara-modal">
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
                    <ul class="list-disc ms-4">
                        <li>
                            Pastikan internet stabil, pilih koneksi yang andal (Wi-Fi atau kabel LAN) agar ujian
                            berjalan lancar!
                        </li>
                        <li>
                            Pengerjaan dapat menggunakan HP/ Laptop
                        </li>
                        <li>
                            Pastikan baterai penuh atau terhubung ke sumber listrik!
                        </li>
                        <li>
                            Soal terdiri dari 40 pilihan ganda.
                        </li>
                        <li>
                            Waktu pengerjaan soal 90 menit.
                        <li>
                            Setelah muncul tampilan soal, silahkan untuk memilih salah satu jawaban dari setiap
                            pertanyaan!
                        </li>
                        <li>
                            Setelah pengerjaan soal selesai, periksa kembali jawaban, jangan sampai ada yang terlewat
                            kemudian pilih menu “SELESAI” pada bagian paling bawah!
                        </li>
                    </ul>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="tata-cara-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Paham</button>
                </div>
            </div>
        </div>
    </div>
    <main class="px-8 py-4 h-[88vh] flex items-center justify-center">
        <img src="{{ $olimpiade->thumbnail ? '/image/background/dashboard.jpg' : '/storage/' . $olimpiade->image }}"
            alt="dashboard image" class="opacity-50 object-cover w-full h-full rounded-md blur-md">
        <div class="absolute flex flex-col items-center justify-center gap-4">
            <h2 class="text-5xl font-bold flex items-center text-center gap-2 underline">
                {{ $olimpiade->name }}
            </h2>
            @if ($now->gt($olimpiade->end_date) || auth()->user()->finish)
                <h1 class="text-center text-5xl font-black text-slate-800">Olimpiade sudah selesai</h1>
            @elseif ($now->lt($olimpiade->start_date))
                <h1 class="text-center text-5xl font-black text-slate-800">Olimpiade belum dimulai</h1>
                <p class="text-3xl font-semibold text-slate-800" id="countdown"></p>
            @else
                <h1 class="text-center text-5xl font-black text-slate-800">Olimpiade sudah dimulai</h1>
                <a href="/quiz"
                    class="text-xl font-semibold text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kerjakan
                    Sekarang</a>
            @endif
        </div>
    </main>
    @if ($now->lt($olimpiade->start_date))
        <script>
            const startDate = new Date('{{ $olimpiade->start_date }}').getTime();
            const countDown = document.getElementById('countdown');

            const x = setInterval(() => {
                const now = new Date().getTime();
                const distance = startDate - now;

                if (distance < 0) {
                    window.location.reload();
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countDown.textContent = `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
            }, 1000);
        </script>
    @endif
    <script>
        function requestToken() {
            fetch("/api/requesttoken", {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: {{ Auth::id() }}
                }),
            }).then(res => res.json()).then(res => {
                localStorage.setItem("API_TOKEN", res.data.token);
                token = res.data.token;
            });
        }
        requestToken();
    </script>
</x-layout>
