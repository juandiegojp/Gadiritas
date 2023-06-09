function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

$(document).ready(function() {
    function checkCookie() {
        let user = getCookie("Gadiritas");
        let d = document.getElementById("sticky-banner");
        if ((user != "") & (user != null)) {
            d.classList.add("hidden");
        } else {
            if (getCookie("cookieAccepted") === "true") {
                d.classList.add("hidden");
            } else {
                d.classList.remove("hidden");
            }
        }
    }

    checkCookie();
});

function acceptCookies() {
    let user = document.getElementById("user").value;
    let d = document.getElementById("sticky-banner");
    setCookie("Gadiritas", user, 30);
    d.classList.add("hidden");
}
