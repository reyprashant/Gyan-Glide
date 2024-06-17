document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signupform');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const checkbox = document.getElementById('termCon');

    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    const checkboxError = document.getElementById('checkboxError');

    // Regular expressions for validation
    const nameRegex = /^[a-zA-Z\s]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;

    // Function to validate name on blur
    function validateName() {
        if (!nameRegex.test(nameInput.value.trim())) {
            nameError.textContent = 'Please enter a valid name';
            return false;
        } else {
            nameError.textContent = '';
            return true;
        }
    }

    // Function to validate email on blur
    function validateEmail() {
        if (!emailRegex.test(emailInput.value.trim())) {
            emailError.textContent = 'Please enter a valid email address';
            return false;
        } else {
            emailError.textContent = '';
            return true;
        }
    }

    // Function to validate password on blur
    function validatePassword() {
        if (!passwordRegex.test(passwordInput.value.trim())) {
            passwordError.textContent = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character';
            return false;
        } else {
            passwordError.textContent = '';
            return true;
        }
    }

    // Function to validate confirm password on input
    function validateConfirmPassword() {
        const confirmPasswordValue = confirmPasswordInput.value.trim();
        const passwordValue = passwordInput.value.trim();

        if (confirmPasswordValue !== passwordValue) {
            confirmPasswordError.textContent = 'Passwords do not match';
            return false;
        } else {
            confirmPasswordError.textContent = '';
            return true;
        }
    }

    // Function to validate checkbox
    function validateCheckbox() {
        if (!checkbox.checked) {
            checkboxError.textContent = 'Please agree to the terms and conditions';
            return false;
        } else {
            checkboxError.textContent = '';
            return true;
        }
    }

    // Event listeners for validation on blur (except confirm password)
    nameInput.addEventListener('blur', validateName);
    emailInput.addEventListener('blur', validateEmail);
    passwordInput.addEventListener('blur', validatePassword);

    // Event listener for input event on confirm password for real-time validation
    confirmPasswordInput.addEventListener('input', validateConfirmPassword);

    // Event listener for checkbox change
    checkbox.addEventListener('change', validateCheckbox);

    // Function to validate the entire form before submission
    function validateForm() {
        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        const isConfirmPasswordValid = validateConfirmPassword();
        const isCheckboxValid = validateCheckbox();

        return isNameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid && isCheckboxValid;
    }

    // Submit event listener for the form
    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});
