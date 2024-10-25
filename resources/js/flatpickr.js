import "flatpickr";
import "flatpickr/dist/themes/light.css";

export function initFlatpickr() {
    document.querySelectorAll("[flatpickr-time]").forEach((element) => {
        flatpickr(element, {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        });
    });

    document.querySelectorAll("[flatpickr-date]").forEach((element) => {
        flatpickr(element, {
            enableTime: false,
            dateFormat: "d-m-Y",
        });
    });
}
