document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('changePasswordForm');
    const pwShowHide = document.querySelectorAll(".showHidePw");
    const pwFields = document.querySelectorAll(".password");
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');

    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
            pwFields.forEach(pwField => {
                if (pwField.type === "password") {
                    pwField.type = "text";

                    pwShowHide.forEach(icon => {
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                } else {
                    pwField.type = "password";

                    pwShowHide.forEach(icon => {
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            })
        })
    })




    // Regular expressions for validation
    const nameRegex = /^[a-zA-Z\s]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;


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


    // Event listeners for validation on blur (except confirm password)
    passwordInput.addEventListener('blur', validatePassword);

    // Event listener for input event on confirm password for real-time validation
    confirmPasswordInput.addEventListener('input', validateConfirmPassword);

    // Function to validate the entire form before submission
    function validateForm() {
        const isPasswordValid = validatePassword();
        const isConfirmPasswordValid = validateConfirmPassword();

        return isPasswordValid && isConfirmPasswordValid;
    }

    // Submit event listener for the form
    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});


//jquery

// <script type="text/javascript">
$(document).ready(function () {
    $(".heart").click(function () {
        var id = $(this).attr("id");
        $.post("gett.php", { data: id, heart: 'c' }, function (data) {
            // if (data < 2) {
                
            //     document.getElementById("total_likes").innerHTML = data + " like";
            // } else {
            //     document.getElementById("total_likes").innerHTML = data + " likes";
            // }

        })
    });


});

function replaceClass(heart) {

    if (heart.classList.contains("fa-solid")) {
        heart.classList.replace('fa-solid', 'fa-regular');
    } else {
        heart.classList.replace('fa-regular', 'fa-solid');
    }

}


// </script>