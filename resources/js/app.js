import "./bootstrap";
import "flowbite";

document.addEventListener("DOMContentLoaded", () => {
    import("./richtext").then(({ initRichText }) => initRichText());
    import("./monitor").then(({ monitor }) => monitor());
    import("./flatpickr").then(({ initFlatpickr }) => initFlatpickr());
});
