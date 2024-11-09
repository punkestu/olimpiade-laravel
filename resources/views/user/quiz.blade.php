<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    @include('components.jitsi')
    <main class="p-4 min-h-[100vh] flex gap-4">
        <div class="text-center fixed bottom-2 right-2 block md:hidden">
            <button
                class="aspect-square text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation">
                <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4" />
                </svg>
            </button>
        </div>

        @include('user.numdrawer', ['questions' => $questions])

        <aside class="flex-grow border p-4 rounded-md flex flex-col gap-4">
            <div class="flex md:hidden justify-end">
                <p>Sisa waktu: <span id="timer">01:30</span></p>
            </div>
            <h5 id="question" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white"></h5>
            <ul class="font-normal text-gray-700 dark:text-gray-400 flex flex-col gap-2">
                <li class="flex items-center gap-2">
                    <input type="radio" name="answer" id="answer1" class="hidden peer/answer"
                        onchange="setAnswer(1)">
                    <label for="answer1" id="answer1-content"
                        class="p-1 rounded-md border-2 peer-checked/answer:border-blue-400 [&_#sym]:bg-gray-300 peer-checked/answer:[&_#sym]:bg-blue-400 peer-checked/answer:[&_#sym]:text-white flex items-center gap-2 w-full">
                        <span id="sym"
                            class="w-8 aspect-square flex items-center justify-center rounded-sm">A</span>
                        <span id="content"></span>
                    </label>
                </li>
                <li class="flex items-center gap-2">
                    <input type="radio" name="answer" id="answer2" class="hidden peer/answer"
                        onchange="setAnswer(2)">
                    <label for="answer2" id="answer2-content"
                        class="p-1 rounded-md border-2 peer-checked/answer:border-blue-400 [&_#sym]:bg-gray-300 peer-checked/answer:[&_#sym]:bg-blue-400 peer-checked/answer:[&_#sym]:text-white flex items-center gap-2 w-full">
                        <span id="sym"
                            class="bg-gray-300 w-8 aspect-square flex items-center justify-center rounded-sm">B</span>
                        <span id="content"></span>
                    </label>
                </li>
                <li class="flex items-center gap-2">
                    <input type="radio" name="answer" id="answer3" class="hidden peer/answer"
                        onchange="setAnswer(3)">
                    <label for="answer3" id="answer3-content"
                        class="p-1 rounded-md border-2 peer-checked/answer:border-blue-400 [&_#sym]:bg-gray-300 peer-checked/answer:[&_#sym]:bg-blue-400 peer-checked/answer:[&_#sym]:text-white flex items-center gap-2 w-full">
                        <span id="sym"
                            class="bg-gray-300 w-8 aspect-square flex items-center justify-center rounded-sm">C</span>
                        <span id="content"></span>
                    </label>
                </li>
                <li class="flex items-center gap-2">
                    <input type="radio" name="answer" id="answer4" class="hidden peer/answer"
                        onchange="setAnswer(4)">
                    <label for="answer4" id="answer4-content"
                        class="p-1 rounded-md border-2 peer-checked/answer:border-blue-400 [&_#sym]:bg-gray-300 peer-checked/answer:[&_#sym]:bg-blue-400 peer-checked/answer:[&_#sym]:text-white flex items-center gap-2 w-full">
                        <span id="sym"
                            class="bg-gray-300 w-8 aspect-square flex items-center justify-center rounded-sm">D</span>
                        <span id="content"></span>
                    </label>
                </li>
            </ul>
            <div class="flex flex-row-reverse justify-between">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-1 hidden"
                    id="done-btn" data-modal-target="confirmation-modal" data-modal-toggle="confirmation-modal">
                    Selesai
                    <svg class="w-5 h-5 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                    </svg>
                </button>
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center"
                    id="next-btn" onclick="nextQuestion()">
                    Selanjutnya
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 5 7 7-7 7" />
                    </svg>
                </button>
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center hidden"
                    id="back-btn" onclick="prevQuestion()">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m15 19-7-7 7-7" />
                    </svg>
                    Kembali
                </button>
            </div>
        </aside>
        <aside class="min-w-[25vw] hidden md:flex flex-col gap-4">
            <div class="border p-4 rounded-md">
                <svg class="w-full h-full" id="radial-timer" viewBox="0 0 100 100">
                    <circle class="text-gray-200 stroke-current" stroke-width="6" cx="50" cy="50"
                        r="40" fill="transparent"></circle>
                    <circle id="outer" class="text-indigo-500  progress-ring__circle stroke-current"
                        stroke-width="6" stroke-linecap="round" cx="50" cy="50" r="40"
                        fill="transparent" transform="rotate(270, 50, 50)" stroke-dasharray="251.2"
                        stroke-dashoffset="calc(251.2px - (251.2px * 100) / 100)"></circle>

                    <text x="50" y="50" font-size="12" text-anchor="middle" alignment-baseline="middle">01:30</text>

                </svg>
            </div>
            <div class="border p-4 rounded-md flex-grow overflow-y-auto">
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-2">Daftar Soal</h5>
                <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 2xl:grid-cols-8 gap-2">
                    @foreach ($questions as $question)
                        <label for="question-num-{{ $question->id }}"
                            class="aspect-square border focus:ring-4 font-medium rounded-md xl:rounded-lg text-sm cursor-pointer">
                            <input type="radio" name="question-num" id="question-num-{{ $question->id }}"
                                class="peer/question-num hidden" {{ $loop->index === 0 ? 'checked' : '' }}
                                onchange="changeQuestion({{ $loop->index }})">
                            <span
                                class="pt-1 w-full h-full flex items-center justify-center rounded-lg peer-checked/question-num:text-white peer-checked/question-num:bg-blue-700 peer-checked/question-num:hover:bg-blue-800 peer-checked/question-num:dark:bg-blue-600 peer-checked/question-num:dark:hover:bg-blue-700">{{ $loop->iteration }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </aside>
    </main>

    <div id="confirmation-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Perhatian!
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="confirmation-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Jawaban akan dikunci!
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Silahkan cek ulang jawaban karena setelah selesai, jawaban tidak bisa diubah kembali
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="confirmation-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onclick="submitAnswer(true)">Selesaikan</button>
                    <button data-modal-hide="confirmation-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cek
                        ulang</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function submitAnswer(finish = false) {
            if (token && (answers.filter(item => item).length !== 0 || finish)) {
                fetch("/api/answer", {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    redirect: 'follow',
                    body: JSON.stringify(
                        answers.map((item, i) => item ? (questions[i] ? ({
                            question_id: questions[i]["id"],
                            answer: item
                        }) : null) : null).filter(item => item)
                    )
                }).then(res => res.json()).then(res => {
                    if (res.code === 200 && finish) {
                        fetch("/api/finish", {
                            headers: {
                                'Authorization': `Bearer ${token}`
                            }
                        }).then(res => res.json()).then(res => {
                            if (res.code === 200) {
                                localStorage.removeItem("API_TOKEN");
                                localStorage.removeItem("answers");
                                localStorage.removeItem("currQuestion");
                                window.location.href = "/dashboard";
                            }
                        });
                    }
                })
            }
        }

        setInterval(submitAnswer, 60 * 1000);
    </script>
    <script>
        var currQuestion = 0;
        const answers = JSON.parse(localStorage.getItem("answers") || "[]");
        const backButton = document.getElementById('back-btn');
        const nextButton = document.getElementById('next-btn');
        const doneButton = document.getElementById('done-btn');

        var token;
        requestToken();

        if (answers[0]) {
            document.querySelector(`#answer${answers[0]}`).checked = true;
        }

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

        function buttonController(index) {
            if (index === 0) {
                if (index < questions.length - 1) nextButton.classList.remove('hidden');
                backButton.classList.add('hidden');
            }
            if (index === questions.length - 1) {
                if (index > 0) backButton.classList.remove('hidden');
                nextButton.classList.add('hidden');
                doneButton.classList.remove('hidden');
            } else {
                doneButton.classList.add('hidden');
            }
            if (index > 0 && index < questions.length - 1) {
                backButton.classList.remove('hidden');
                nextButton.classList.remove('hidden');
            }
        }

        function nextQuestion() {
            if (currQuestion < questions.length - 1) {
                changeQuestion(currQuestion + 1);
                buttonController(currQuestion);
            }
        }

        function prevQuestion() {
            if (currQuestion > 0) {
                changeQuestion(currQuestion - 1);
                buttonController(currQuestion);
            }
        }

        function changeQuestion(index) {
            if (index === currQuestion) return;
            if (index < 0 || index >= questions.length) return;

            buttonController(index);

            if (answers[index] !== undefined)
                document.getElementById(`answer${answers[index]}`).checked = true;
            else if (answers[currQuestion] !== undefined)
                document.querySelector('input[name="answer"]:checked').checked = false;

            setQuestion(index);

            localStorage.setItem('currQuestion', currQuestion);
        }

        function setQuestion(index) {
            const question = questions[index];
            currQuestion = index;

            document.getElementById('question').innerHTML = question.question;
            document.querySelector('#answer1-content > #content').innerHTML = question.answer1;
            document.querySelector('#answer2-content > #content').innerHTML = question.answer2;
            document.querySelector('#answer3-content > #content').innerHTML = question.answer3;
            document.querySelector('#answer4-content > #content').innerHTML = question.answer4;

            document.querySelector("#question-num-drawer-" + question.id).checked = true;
            document.querySelector("#question-num-" + question.id).checked = true;

            document.dispatchEvent(new CustomEvent('refresh-katex'));
        }

        function setAnswer(answer) {
            answers[currQuestion] = answer;
            localStorage.setItem('answers', JSON.stringify(answers));
        }
    </script>
    <script>
        const questions = @json($questions);
        if (questions.length === 0) {
            document.getElementById('question').innerHTML = '<h1 class="text-2xl">Tidak ada soal</h1>';
        } else {
            if (localStorage.getItem('currQuestion')) {
                currQuestion = parseInt(localStorage.getItem('currQuestion'));
            }
            setQuestion(currQuestion);
            buttonController(currQuestion);
        }
    </script>
    <script>
        const startTime = new Date('{{ $start_time }}').getTime();
        var endTime = new Date('{{ $end_time }}').getTime();
        const duration = endTime - startTime;
        var checking = false;
        setInterval(() => {
            if (new Date().getTime() > endTime) {
                if (!checking) {
                    recheckTime();
                }
            } else {
                setTimer();
            }
        }, 1000);

        function setTimer() {
            const timeRemaining = endTime - new Date().getTime();
            const percentage = (timeRemaining / duration) * 100;
            const offset = 251.2 - (251.2 * (percentage)) / 100;
            document.querySelector("#radial-timer > #outer").setAttribute("stroke-dashoffset", offset);
            document.querySelector("#radial-timer > text").innerHTML = new Date(timeRemaining).toISOString().split("T")[1]
                .substr(0, 8);
            document.getElementById('timer').innerHTML = new Date(timeRemaining).toISOString().split("T")[1].substr(0, 8);
        }

        function recheckTime() {
            checking = true;
            fetch("/api/time", {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            }).then(res => res.json()).then(res => {
                if (res.code === 200) {
                    endTime = new Date(res.data.end_time).getTime();
                }
                if (new Date().getTime() > endTime) {
                    console.log("Waktu habis");
                    submitAnswer(true);
                } else {
                    checking = false;
                }
            });
        }
        setTimer();
    </script>
</x-layout>
