const form = document.getElementById("signup-form");
form.addEventListener("submit", function (event) {
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const confirm_password = document.getElementById("confirm_password");
    const usernameError = document.getElementById("username-error");
    const passwordError = document.getElementById("password-error");
    const confirm_passwordError = document.getElementById("confirm-" +
        "password-error");
    usernameError.textContent = "";
    passwordError.textContent = "";
    confirm_passwordError.textContent = "";
    if (username.value.length < 3) {
        event.preventDefault();
        usernameError.textContent = "Username must be at least 3 " +
            "characters long";
    }
    if (password.value.length < 6) {
        event.preventDefault();
        passwordError.textContent = "Password must be at least 6 " +
            "characters long";
    }
    if (password.value !== confirm_password.value) {
        event.preventDefault();
        confirm_passwordError.textContent = "Passwords do not match";
    }
});