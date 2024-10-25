import "./bootstrap";
import "flowbite";
import { initRichText } from "./richtext";
import { monitor } from "./monitor";
import { initFlatpickr } from "./flatpickr";

document.addEventListener("DOMContentLoaded", () => {
    initRichText();
    monitor();
    initFlatpickr();
});
