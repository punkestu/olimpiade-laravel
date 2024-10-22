import "./bootstrap";
import "flowbite";
import { initRichText } from "./richtext";
import { monitor } from "./monitor";

document.addEventListener("DOMContentLoaded", () => {
    initRichText();
    monitor();
});
