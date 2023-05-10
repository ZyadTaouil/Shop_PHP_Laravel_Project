var form = document.getElementById("checkout-form");
form.addEventListener("submit", function (event) {
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var address = document.getElementById("address");
    var nameError = document.getElementById("name-error");
    var emailError = document.getElementById("email-error");
    var phoneError = document.getElementById("phone-error");
    var addressError = document.getElementById("address-error");
    nameError.textContent = "";
    emailError.textContent = "";
    phoneError.textContent = "";
    addressError.textContent = "";
    if (name.value.length < 3) {
        event.preventDefault();
        nameError.textContent = "Name must be at least 3 characters long";
    }
    if (!email.value.includes("@")) {
        event.preventDefault();
        emailError.textContent = "Email must be a valid email address";
    }
    if (phone.value.length < 10) {
        event.preventDefault();
        phoneError.textContent = "Phone must be at least 10 digits long";
    }
    if (address.value.length < 10) {
        event.preventDefault();
        addressError.textContent = "Address must be at least " +
            "10 characters long";
    }
});
