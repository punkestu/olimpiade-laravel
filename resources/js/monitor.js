export function monitor() {
    if (window.location.pathname != "/quiz") {
        return;
    }
    initial();
    window.onresize = () => {
        if (isFullScreen()) {
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
    document.addEventListener("visibilitychange", () => {
        if (document.visibilityState == "visible") {
            pushAlert("tab", "visible");
        } else {
            pushAlert("tab", "hidden");
        }
    });
}

function isFullScreen() {
    return (
        (window.innerWidth / screen.width) * 100 >= 75 &&
        (window.innerHeight / screen.height) * 100 >= 75
    );
}

var monitor_stack = JSON.parse(localStorage.getItem("MONITOR")) || [];
var pusher;

function pushAlert(code, message, data = undefined) {
    if (!localStorage.getItem("API_TOKEN")) {
        window.location.href = "/login";
    }
    if (data && code == "screen") {
        data = `${data.screenWidth}x${data.screenHeight} ${data.width}x${data.height}`;
    }
    monitor_stack.push({ code, message, data });
    localStorage.setItem("MONITOR", JSON.stringify(monitor_stack));
    if (!pusher) {
        pusher = setTimeout(() => {
            fetch("/api/monitor", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Authorization:
                        "Bearer " + localStorage.getItem("API_TOKEN"),
                },
                body: JSON.stringify(monitor_stack),
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    monitor_stack = [];
                    localStorage.setItem(
                        "MONITOR",
                        JSON.stringify(monitor_stack)
                    );
                    pusher = undefined;
                })
                .catch((error) => console.error(error));
        }, 1);
    }
}

function initial() {
    if (!localStorage.getItem("API_TOKEN")) {
        window.location.href = "/login";
    }
    const screenData = {
        width: window.innerWidth,
        height: window.innerHeight,
        screenWidth: screen.width,
        screenHeight: screen.height,
    };
    fetch("/api/monitor", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + localStorage.getItem("API_TOKEN"),
        },
        body: JSON.stringify([
            {
                code: "screen",
                message: isFullScreen() ? "fullscreen" : "windowed",
                data: `${screenData.screenWidth}x${screenData.screenHeight} ${screenData.width}x${screenData.height}`,
            },
            {
                code: "tab",
                message: document.visibilityState,
            },
        ]),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            monitor_stack = [];
            localStorage.setItem("MONITOR", JSON.stringify(monitor_stack));
            pusher = undefined;
        })
        .catch((error) => console.error(error));
}
