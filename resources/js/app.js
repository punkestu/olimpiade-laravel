import "./bootstrap";
import "flowbite";

document.addEventListener("DOMContentLoaded", () => {
    import("./richtext").then(({ initRichText, setKatex }) => {
        initRichText();
        setKatex();
    });
    import("./monitor").then(({ monitor }) => monitor());
    import("./flatpickr").then(({ initFlatpickr }) => initFlatpickr());
});

document.addEventListener("refresh-katex", () => {
    import("./richtext").then(({ setKatex }) => {
        setKatex();
    });
});
