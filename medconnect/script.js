let showPasswordBtn = document.querySelector('.show-password');
let passwordInp = document.querySelector('.password-input');
let passwordChecklist = document.querySelectorAll('.list-item');

showPasswordBtn.addEventListener('click', () => {
    showPasswordBtn.classList.toggle('fa-eye');
    showPasswordBtn.classList.toggle('fa-eye-slash');

    passwordInp.type = (passwordInp.type === 'password') ? 'text' : 'password';
});

// script.js for cookie settings

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

let validationRegex = [
    { regex: /.{8,}/ },
    { regex: /[0-9]/ },
    { regex: /[a-z]/},
    { regex: /[A-Z]/},
    { regex: /[^A-Za-z0-9]/ } 
]

passwordInp.addEventListener('keyup', () => {
    validationRegex.forEach((item, i) => { // Fix the syntax for forEach
        let isValid = item.regex.test(passwordInp.value);

        if (isValid) { // Fix the case of isValid
            // Do something with passwordChecklist[i], for example, add a class
            passwordChecklist[i].classList.add('checked');
        } else {
            // Handle the case when the password is not valid, for example, remove a class
            passwordChecklist[i].classList.remove('checked');
        }
    });
});
