import "./bootstrap";
import "flowbite";
import { initRichText } from "./richtext";
import { monitor } from "./monitor";

import "flatpickr";
import "flatpickr/dist/themes/light.css";

document.addEventListener("DOMContentLoaded", () => {
    initRichText();
    monitor();
});
