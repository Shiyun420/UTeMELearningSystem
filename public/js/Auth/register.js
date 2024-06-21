function check(event) {
    var phone = document.getElementById("phoneNum").value;
    var ic = document.getElementById("IC").value;
    
    // Select all elements with the class 'validation-errors'
    var errorElements = document.querySelectorAll('.validation-errors');

    // Validate phone number: must be 10 or 11 digits, and start with '01'
    var isPhoneValid = /^(01\d{8,9})$/.test(phone);
    // Validate IC number: must be 12 digits
    var isIcValid = /^\d{12}$/.test(ic);
    
    var isValid = true;

    // Clear previous error messages
    errorElements.forEach(function(element) {
        element.textContent = '';
    });

    if (!isPhoneValid) {
        errorElements.forEach(function(element) {
            element.textContent += 'Please enter a valid phone number (10 or 11 digits starting with 01).\n';
        });
        isValid = false;
    }

    if (!isIcValid) {
        errorElements.forEach(function(element) {
            element.textContent += 'Please enter a valid IC (12 digits).\n';
        });
        isValid = false;
    }
    
    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    }

    return isValid;
}

