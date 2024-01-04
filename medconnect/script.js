let showPasswordBtn = document.querySelector('.show-password');
let passwordInp = document.querySelector('.password-input');
let passwordChecklist = document.querySelectorAll('.list-item');

showPasswordBtn.addEventListener('click', () => {
    showPasswordBtn.classList.toggle('fa-eye');
    showPasswordBtn.classList.toggle('fa-eye-slash');

    passwordInp.type = (passwordInp.type === 'password') ? 'text' : 'password';
});

// script.js for cookie settings

// Cookie Functions
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    const name = cname + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function acceptCookies() {
    setCookie("cookieConsent", "accepted", 365);
    document.getElementById("cookie-banner").style.display = "none";
}

function rejectCookies() {
    setCookie("cookieConsent", "rejected", 365);
    document.getElementById("cookie-banner").style.display = "none";
}

// Check for Cookie on Every Page Load
window.onload = function () {
    const cookieConsent = getCookie("cookieConsent");
    if (cookieConsent === "accepted" || cookieConsent === "rejected") {
        document.getElementById("cookie-banner").style.display = "none";
    }
};

// Existing Password Validation
let validationRegex = [
    { regex: /.{8,}/ },
    { regex: /[0-9]/ },
    { regex: /[a-z]/},
    { regex: /[A-Z]/},
    { regex: /[^A-Za-z0-9]/ } 
];

passwordInp.addEventListener('keyup', () => {
    validationRegex.forEach((item, i) => {
        let isValid = item.regex.test(passwordInp.value);

        if (isValid) {
            passwordChecklist[i].classList.add('checked');
        } else {
            passwordChecklist[i].classList.remove('checked');
        }
    });
});

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }