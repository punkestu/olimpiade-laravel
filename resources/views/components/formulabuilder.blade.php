<div id="{{ $name }}-formula-modal" tabindex="-1" aria-hidden="true"
    class="{{ $name }}-formula-modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Buat Formula
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="{{ $name }}-formula-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <div>
                    <div class="my-2 flex gap-1">
                        <input type="radio" name="formula" id="fraction" value="fraction"
                            class="hidden peer/fraction">
                        <label for="fraction"
                            class="p-1 border peer-checked/fraction:border-blue-500 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17.536px" height="32.832px"
                                viewBox="0 -1117 969 1814" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                style="">
                                <defs>
                                    <path id="MJX-9-TEX-I-1D44E"
                                        d="M33 157Q33 258 109 349T280 441Q331 441 370 392Q386 422 416 422Q429 422 439 414T449 394Q449 381 412 234T374 68Q374 43 381 35T402 26Q411 27 422 35Q443 55 463 131Q469 151 473 152Q475 153 483 153H487Q506 153 506 144Q506 138 501 117T481 63T449 13Q436 0 417 -8Q409 -10 393 -10Q359 -10 336 5T306 36L300 51Q299 52 296 50Q294 48 292 46Q233 -10 172 -10Q117 -10 75 30T33 157ZM351 328Q351 334 346 350T323 385T277 405Q242 405 210 374T160 293Q131 214 119 129Q119 126 119 118T118 106Q118 61 136 44T179 26Q217 26 254 59T298 110Q300 114 325 217T351 328Z">
                                    </path>
                                    <path id="MJX-9-TEX-I-1D44F"
                                        d="M73 647Q73 657 77 670T89 683Q90 683 161 688T234 694Q246 694 246 685T212 542Q204 508 195 472T180 418L176 399Q176 396 182 402Q231 442 283 442Q345 442 383 396T422 280Q422 169 343 79T173 -11Q123 -11 82 27T40 150V159Q40 180 48 217T97 414Q147 611 147 623T109 637Q104 637 101 637H96Q86 637 83 637T76 640T73 647ZM336 325V331Q336 405 275 405Q258 405 240 397T207 376T181 352T163 330L157 322L136 236Q114 150 114 114Q114 66 138 42Q154 26 178 26Q211 26 245 58Q270 81 285 114T318 219Q336 291 336 325Z">
                                    </path>
                                </defs>
                                <g stroke="#000000" fill="#000000" stroke-width="0" transform="scale(1,-1)">
                                    <g data-mml-node="math">
                                        <g data-mml-node="mfrac">
                                            <g data-mml-node="mi" transform="translate(220,676)">
                                                <use data-c="1D44E" xlink:href="#MJX-9-TEX-I-1D44E"></use>
                                            </g>
                                            <g data-mml-node="mi" transform="translate(270,-686)">
                                                <use data-c="1D44F" xlink:href="#MJX-9-TEX-I-1D44F"></use>
                                            </g>
                                            <rect width="729" height="60" x="120" y="220"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </label>
                        <input type="radio" name="formula" id="exponent" value="exponent"
                            class="hidden peer/exponent">
                        <label for="exponent"
                            class="p-1 border peer-checked/exponent:border-blue-500 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.400px" height="13.312px"
                                viewBox="0 -725.5 1016.5 735.5" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" style="">
                                <defs>
                                    <path id="MJX-12-TEX-I-1D44E"
                                        d="M33 157Q33 258 109 349T280 441Q331 441 370 392Q386 422 416 422Q429 422 439 414T449 394Q449 381 412 234T374 68Q374 43 381 35T402 26Q411 27 422 35Q443 55 463 131Q469 151 473 152Q475 153 483 153H487Q506 153 506 144Q506 138 501 117T481 63T449 13Q436 0 417 -8Q409 -10 393 -10Q359 -10 336 5T306 36L300 51Q299 52 296 50Q294 48 292 46Q233 -10 172 -10Q117 -10 75 30T33 157ZM351 328Q351 334 346 350T323 385T277 405Q242 405 210 374T160 293Q131 214 119 129Q119 126 119 118T118 106Q118 61 136 44T179 26Q217 26 254 59T298 110Q300 114 325 217T351 328Z">
                                    </path>
                                    <path id="MJX-12-TEX-I-1D465"
                                        d="M52 289Q59 331 106 386T222 442Q257 442 286 424T329 379Q371 442 430 442Q467 442 494 420T522 361Q522 332 508 314T481 292T458 288Q439 288 427 299T415 328Q415 374 465 391Q454 404 425 404Q412 404 406 402Q368 386 350 336Q290 115 290 78Q290 50 306 38T341 26Q378 26 414 59T463 140Q466 150 469 151T485 153H489Q504 153 504 145Q504 144 502 134Q486 77 440 33T333 -11Q263 -11 227 52Q186 -10 133 -10H127Q78 -10 57 16T35 71Q35 103 54 123T99 143Q142 143 142 101Q142 81 130 66T107 46T94 41L91 40Q91 39 97 36T113 29T132 26Q168 26 194 71Q203 87 217 139T245 247T261 313Q266 340 266 352Q266 380 251 392T217 404Q177 404 142 372T93 290Q91 281 88 280T72 278H58Q52 284 52 289Z">
                                    </path>
                                </defs>
                                <g stroke="#000000" fill="#000000" stroke-width="0" transform="scale(1,-1)">
                                    <g data-mml-node="math">
                                        <g data-mml-node="msup">
                                            <g data-mml-node="mi">
                                                <use data-c="1D44E" xlink:href="#MJX-12-TEX-I-1D44E"></use>
                                            </g>
                                            <g data-mml-node="mi" transform="translate(562,413) scale(0.707)">
                                                <use data-c="1D465" xlink:href="#MJX-12-TEX-I-1D465"></use>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </label>
                        <input type="radio" name="formula" id="root" value="root" class="hidden peer/root">
                        <label for="root" class="p-1 border peer-checked/root:border-blue-500 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.792px" height="19.184px"
                                viewBox="0 -890.8 1425 1060" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" style="">
                                <defs>
                                    <path id="MJX-33-TEX-N-221A"
                                        d="M95 178Q89 178 81 186T72 200T103 230T169 280T207 309Q209 311 212 311H213Q219 311 227 294T281 177Q300 134 312 108L397 -77Q398 -77 501 136T707 565T814 786Q820 800 834 800Q841 800 846 794T853 782V776L620 293L385 -193Q381 -200 366 -200Q357 -200 354 -197Q352 -195 256 15L160 225L144 214Q129 202 113 190T95 178Z">
                                    </path>
                                    <path id="MJX-33-TEX-I-1D465"
                                        d="M52 289Q59 331 106 386T222 442Q257 442 286 424T329 379Q371 442 430 442Q467 442 494 420T522 361Q522 332 508 314T481 292T458 288Q439 288 427 299T415 328Q415 374 465 391Q454 404 425 404Q412 404 406 402Q368 386 350 336Q290 115 290 78Q290 50 306 38T341 26Q378 26 414 59T463 140Q466 150 469 151T485 153H489Q504 153 504 145Q504 144 502 134Q486 77 440 33T333 -11Q263 -11 227 52Q186 -10 133 -10H127Q78 -10 57 16T35 71Q35 103 54 123T99 143Q142 143 142 101Q142 81 130 66T107 46T94 41L91 40Q91 39 97 36T113 29T132 26Q168 26 194 71Q203 87 217 139T245 247T261 313Q266 340 266 352Q266 380 251 392T217 404Q177 404 142 372T93 290Q91 281 88 280T72 278H58Q52 284 52 289Z">
                                    </path>
                                </defs>
                                <g stroke="#000000" fill="#000000" stroke-width="0" transform="scale(1,-1)">
                                    <g data-mml-node="math">
                                        <g data-mml-node="msqrt">
                                            <g transform="translate(853,0)">
                                                <g data-mml-node="mi">
                                                    <use data-c="1D465" xlink:href="#MJX-33-TEX-I-1D465"></use>
                                                </g>
                                            </g>
                                            <g data-mml-node="mo" transform="translate(0,30.8)">
                                                <use data-c="221A" xlink:href="#MJX-33-TEX-N-221A"></use>
                                            </g>
                                            <rect width="572" height="60" x="853" y="770.8"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </label>
                        <input type="radio" name="formula" id="sqroot" value="sqroot"
                            class="hidden peer/sqroot">
                        <label for="sqroot"
                            class="p-1 border peer-checked/sqroot:border-blue-500 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.200px" height="19.184px"
                                viewBox="0 -1016.8 1282 1060" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" style="">
                                <defs>
                                    <path id="MJX-31-TEX-I-1D44E"
                                        d="M33 157Q33 258 109 349T280 441Q331 441 370 392Q386 422 416 422Q429 422 439 414T449 394Q449 381 412 234T374 68Q374 43 381 35T402 26Q411 27 422 35Q443 55 463 131Q469 151 473 152Q475 153 483 153H487Q506 153 506 144Q506 138 501 117T481 63T449 13Q436 0 417 -8Q409 -10 393 -10Q359 -10 336 5T306 36L300 51Q299 52 296 50Q294 48 292 46Q233 -10 172 -10Q117 -10 75 30T33 157ZM351 328Q351 334 346 350T323 385T277 405Q242 405 210 374T160 293Q131 214 119 129Q119 126 119 118T118 106Q118 61 136 44T179 26Q217 26 254 59T298 110Q300 114 325 217T351 328Z">
                                    </path>
                                    <path id="MJX-31-TEX-N-221A"
                                        d="M95 178Q89 178 81 186T72 200T103 230T169 280T207 309Q209 311 212 311H213Q219 311 227 294T281 177Q300 134 312 108L397 -77Q398 -77 501 136T707 565T814 786Q820 800 834 800Q841 800 846 794T853 782V776L620 293L385 -193Q381 -200 366 -200Q357 -200 354 -197Q352 -195 256 15L160 225L144 214Q129 202 113 190T95 178Z">
                                    </path>
                                    <path id="MJX-31-TEX-I-1D44F"
                                        d="M73 647Q73 657 77 670T89 683Q90 683 161 688T234 694Q246 694 246 685T212 542Q204 508 195 472T180 418L176 399Q176 396 182 402Q231 442 283 442Q345 442 383 396T422 280Q422 169 343 79T173 -11Q123 -11 82 27T40 150V159Q40 180 48 217T97 414Q147 611 147 623T109 637Q104 637 101 637H96Q86 637 83 637T76 640T73 647ZM336 325V331Q336 405 275 405Q258 405 240 397T207 376T181 352T163 330L157 322L136 236Q114 150 114 114Q114 66 138 42Q154 26 178 26Q211 26 245 58Q270 81 285 114T318 219Q336 291 336 325Z">
                                    </path>
                                </defs>
                                <g stroke="#000000" fill="#000000" stroke-width="0" transform="scale(1,-1)">
                                    <g data-mml-node="math">
                                        <g data-mml-node="mroot">
                                            <g>
                                                <g data-mml-node="mi" transform="translate(853,0)">
                                                    <use data-c="1D44F" xlink:href="#MJX-31-TEX-I-1D44F"></use>
                                                </g>
                                            </g>
                                            <g data-mml-node="mpadded" transform="translate(114,511.8) scale(0.5)">
                                                <g transform="translate(0,333.3)">
                                                    <g data-mml-node="mi">
                                                        <use data-c="1D44E" xlink:href="#MJX-31-TEX-I-1D44E"></use>
                                                    </g>
                                                </g>
                                            </g>
                                            <g data-mml-node="mo" transform="translate(0,156.7)">
                                                <use data-c="221A" xlink:href="#MJX-31-TEX-N-221A"></use>
                                            </g>
                                            <rect width="429" height="60" x="853" y="896.7"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </label>
                    </div>
                    <div class="my-2">
                        <input type="hidden" name="formula-container" value>
                        <div id="fraction-input" class="formula-input flex flex-col gap-2 hidden">
                            <input type="text" id="a" class="text-center" placeholder="a">
                            <hr class="border border-black">
                            <input type="text" id="b" class="text-center" placeholder="b">
                        </div>
                        <div id="exponent-input" class="formula-input flex gap-2 hidden">
                            <input type="text" id="a" class="text-center w-56 h-24" placeholder="a">
                            <input type="text" id="b" class="text-center w-24 h-10" placeholder="x">
                        </div>
                        <div id="root-input" class="formula-input flex gap-2 hidden">
                            <input type="text" id="a" class="text-center flex-grow" placeholder="x">
                        </div>
                        <div id="sqroot-input" class="formula-input flex gap-2 hidden">
                            <input type="text" id="a" class="text-center w-24 h-10" placeholder="a">
                            <input type="text" id="b" class="text-center w-56 h-24" placeholder="b">
                        </div>
                    </div>
                    <button type="button" id="insertFormula" data-modal-hide="{{ $name }}-formula-modal"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onclick="insert()">Sisipkan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var lastInput;
    document.querySelectorAll('input[name="formula"]').forEach((input) => {
        input.addEventListener('change', (e) => {
            if (e.target.checked) {
                if (lastInput) {
                    lastInput.classList.add('hidden');
                }
                lastInput = document.querySelector(`#${e.target.id}-input`);
                lastInput.classList.remove('hidden');
            }
        });
    });

    function insert() {
        const formula = document.querySelector('input[name="formula"]:checked').value;
        var formulaLatex = '';
        switch (formula) {
            case 'fraction':
                formulaLatex = fractionFormula();
                break;
            case 'exponent':
                formulaLatex = exponentFormula();
                break;
            case 'root':
                formulaLatex = rootFormula();
                break;
            case 'sqroot':
                formulaLatex = sqrootFormula();
                break;
        }
        document.querySelector("[name=formula-container]").value = formulaLatex;
        document.querySelector("[name=formula-container]").dispatchEvent(new Event('change'));
    }
</script>
<script>
    function fractionFormula() {
        const a = document.querySelector('#fraction-input #a').value;
        const b = document.querySelector('#fraction-input #b').value;
        document.querySelector('#fraction-input #a').value = '';
        document.querySelector('#fraction-input #b').value = '';
        return `\\frac{${a}}{${b}}`;
    }

    function exponentFormula() {
        const a = document.querySelector('#exponent-input #a').value;
        const b = document.querySelector('#exponent-input #b').value;
        document.querySelector('#exponent-input #a').value = '';
        document.querySelector('#exponent-input #b').value = '';
        return `${a}^{${b}}`;
    }

    function rootFormula() {
        const a = document.querySelector('#root-input #a').value;
        document.querySelector('#root-input #a').value = '';
        return `\\sqrt{${a}}`;
    }

    function sqrootFormula() {
        const a = document.querySelector('#sqroot-input #a').value;
        const b = document.querySelector('#sqroot-input #b').value;
        document.querySelector('#sqroot-input #a').value = '';
        document.querySelector('#sqroot-input #b').value = '';
        return `\\sqrt[${a}]{${b}}`;
    }
</script>
