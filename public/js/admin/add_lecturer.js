function check(event) {
    var phone = document.getElementById("phoneNum").value;
    var ic = document.getElementById("IC").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("password_confirmation").value;
    
    var phoneError = document.getElementById("phoneError");
    var icError = document.getElementById("icError");
    var passwordError = document.getElementById("passwordError");
    var passwordConfirmationError = document.getElementById("passwordConfirmationError");

    // Validate phone number: must be 10 or 11 digits, and start with '01'
    var isPhoneValid = /^(01\d{8,9})$/.test(phone);
    // Validate IC number: must be 12 digits
    var isIcValid = /^\d{12}$/.test(ic);
    // Validate password length
    var isPasswordValid = password.length >= 8;
    // Validate password confirmation
    var isPasswordConfirmationValid = password === confirm_password;

    var isValid = true;

    if (!isPhoneValid) {
        phoneError.style.display = 'inline-block';
        phoneError.textContent = 'Please enter a valid phone number (10 or 11 digits starting with 01).';
        isValid = false;
    } else {
        phoneError.style.display = 'none';
    }

    if (!isIcValid) {
        icError.style.display = 'inline-block';
        icError.textContent = 'Please enter a valid IC (12 digits, e.g., 981025012323).';
        isValid = false;
    } else {
        icError.style.display = 'none';
    }

    if (!isPasswordValid) {
        passwordError.style.display = 'inline-block';
        passwordError.textContent = 'The password field must be at least 8 characters.';
        isValid = false;
    } else {
        passwordError.style.display = 'none';
    }

    if (!isPasswordConfirmationValid) {
        passwordConfirmationError.style.display = 'inline-block';
        passwordConfirmationError.textContent = 'The password field confirmation does not match.';
        isValid = false;
    } else {
        passwordConfirmationError.style.display = 'none';
    }

    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    }

    return isValid;
}
