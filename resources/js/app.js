import "./bootstrap";
import "flowbite";

document.addEventListener("DOMContentLoaded", () => {
    import("./richtext").then(({ initRichText, setKatex }) => {
        initRichText();
        setKatex();
        document.dispatchEvent(new CustomEvent('richtext-loaded'));
    });
    import("./monitor").then(({ monitor }) => monitor());
    import("./flatpickr").then(({ initFlatpickr }) => initFlatpickr());
});

document.addEventListener("refresh-katex", () => {
    import("./richtext").then(({ setKatex }) => {
        setKatex();
        document.dispatchEvent(new CustomEvent('katex-refreshed'));
    });
});
