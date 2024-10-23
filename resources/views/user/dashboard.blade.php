<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <main class="px-8 py-4 h-[88vh] flex items-center justify-center">
        <img src="/image/background/dashboard.jpg" alt="dashboard image"
            class="opacity-50 object-cover w-full h-full rounded-md blur-md">
        <div class="absolute flex flex-col items-center justify-center gap-4">
            <h2 class="text-5xl font-bold flex items-center gap-2 underline">
                {{ $olimpiade->name }}
            </h2>
            @if ($now->gt($olimpiade->end_date) || auth()->user()->finish)
                <h1 class="text-5xl font-black text-slate-800">Olimpiade sudah selesai</h1>
                <a href="/"
                    class="text-xl font-semibold text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Review
                    Pekerjaan</a>
            @elseif ($now->lt($olimpiade->start_date))
                <h1 class="text-5xl font-black text-slate-800">Olimpiade belum dimulai</h1>
                <p class="text-3xl font-semibold text-slate-800" id="countdown"></p>
            @else
                <h1 class="text-5xl font-black text-slate-800">Olimpiade sudah dimulai</h1>
                <a href="/quiz"
                    class="text-xl font-semibold text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kerjakan
                    Sekarang</a>
            @endif
        </div>
    </main>
    @if (now() < $olimpiade->start_date)
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
</x-layout>
