let showPasswordBtn = document.querySelector('.show-password');
let passwordInp = document.querySelector('.password-input');

showPasswordBtn.addEventListener('click', () => {
    showPasswordBtn.classList.toggle('fa-eye');
    showPasswordBtn.classList.toggle('fa-eye-slash');

    passwordInp.type = (passwordInp.type === 'password') ? 'text' : 'password';
});

// script.js

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function acceptCookies() {
    setCookie("cookieConsent", "accepted", 365);  // Cookie valid for 1 year
    document.getElementById("cookie-banner").style.display = "none";  // Hide the banner
}

function rejectCookies() {
    setCookie("cookieConsent", "rejected", 365);  // Cookie valid for 1 year
    document.getElementById("cookie-banner").style.display = "none";  // Hide the banner
    // Optionally, you may want to handle additional actions for rejected cookies.
}

// Check for existing cookie on page load
window.onload = function () {
    const cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)cookieConsent\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    if (cookieValue === "accepted" || cookieValue === "rejected") {
        document.getElementById("cookie-banner").style.display = "none";
    }
}


