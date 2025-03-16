<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soal {{ $olimpiade->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        <nav class="bg-white dark:bg-gray-900 w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/image/icon.png" class="h-8" alt="Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Daftar
                        Soal</span>
                </div>
            </div>
        </nav>
        @foreach ($questions as $question)
            <div class="border p-2">
                <h1 class="font-bold text-lg my-1">Soal {{ $loop->iteration }}</h1>
                <div
                    class="[&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4  [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_td]:break-words">
                    {!! $question->question !!}
                </div>
                Jawaban
                <ol class="[&>li]:ms-4 list-[lower-latin]">
                    <li
                        class="[&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4  [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_td]:break-words">
                        {!! $question->answer1 !!}
                    </li>
                    <li
                        class="[&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4  [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_td]:break-words">
                        {!! $question->answer2 !!}
                    </li>
                    <li
                        class="[&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4  [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_td]:break-words">
                        {!! $question->answer3 !!}
                    </li>
                    <li
                        class="[&_li]:gap-1 [&_ol]:list-decimal [&_ol]:ms-4  [&_table]:border [&_td]:border [&_th]:border [&_td]:p-1 [&_th]:p-1 [&_th]:bg-gray-300 [&_td]:text-wrap [&_th]:text-wrap [&_td]:break-words">
                        {!! $question->answer4 !!}
                    </li>
                </ol>
            </div>
        @endforeach
        <script>
            document.addEventListener('richtext-loaded', () => {
                window.print();
            });
        </script>
    </main>
</body>

</html>
