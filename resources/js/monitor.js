export function monitor() {
    if (window.location.pathname != "/quiz") {
        return;
    }
    window.onresize = () => {
        if (window.innerWidth == screen.width) {
            pushAlert("screen", "fullscreen", {
                width: window.innerWidth,
                height: window.innerHeight,
                screenWidth: screen.width,
                screenHeight: screen.height,
            });
        } else {
            pushAlert("screen", "windowed", {
                width: window.innerWidth,
                height: window.innerHeight,
                screenWidth: screen.width,
                screenHeight: screen.height,
            });
        }
    };
    document.addEventListener("visibilitychange", (event) => {
        if (document.visibilityState == "visible") {
            pushAlert("tab", "visible");
        } else {
            pushAlert("tab", "hidden");
        }
    });
}

var monitor_stack = JSON.parse(localStorage.getItem("MONITOR")) || [];
var pusher;

function pushAlert(code, message, data = undefined) {
    if (!localStorage.getItem("API_TOKEN")) {
        window.location.href = "/login";
    }
    data = data ? JSON.stringify(data) : undefined;
    monitor_stack.push({ code, message, data });
    localStorage.setItem("MONITOR", JSON.stringify(monitor_stack));
    if (!pusher) {
        pusher = setTimeout(() => {
            fetch("/api/monitor", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "Bearer " + localStorage.getItem("API_TOKEN"),
                },
                body: JSON.stringify(monitor_stack),
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    monitor_stack = [];
                    localStorage.setItem("MONITOR", JSON.stringify(monitor_stack));
                    pusher = undefined;
                })
                .catch((error) => console.error(error));
        }, 10000);
    }
    // fetch("/api/monitor", {
    //     method: "POST",
    //     headers: {
    //         "Content-Type": "application/json",
    //         Authorization: "Bearer " + localStorage.getItem("API_TOKEN"),
    //     },
    //     body: JSON.stringify({ code, message, data }),
    // })
    //     .then((response) => response.json())
    //     .then((data) => console.log(data))
    //     .catch((error) => console.error(error));
}
