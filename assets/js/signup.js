// Scripts for sign up form
console.log("Hello");
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
})()

///////////////////////////////////////////////////////////////////////////////////////////////////////////

document.getElementById("registrationForm").addEventListener('submit', function(evt){
  if(window.confirm("Are you sure you want to submit the form?") == false){
      evt.preventDefault();
  }
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////

const countrySelect = document.getElementById('countrySelect');
// Fetch country data from Rest Countries API
fetch('https://restcountries.com/v3.1/all')
    .then(response => response.json())
    .then(countries => {
    countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country.cca2; // Use the country code as the value
        option.textContent = `${country.name.common} (${country.cca2})`;
        countrySelect.appendChild(option);
    });
})
.catch(error => console.error('Error fetching countries:', error));

///////////////////////////////////////////////////////////////////////////////////////////////////////////

document.getElementById("registrationForm").addEventListener('submit', function (evt) {
    // Check for empty fields
    var isValid = true;

    document.querySelectorAll('.needs-validation :required').forEach(function (field) {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('is-invalid');
            field.nextElementSibling.innerHTML = 'Please fill in this field.';
        } else {
            field.classList.remove('is-invalid');
            field.nextElementSibling.innerHTML = '';
        }
    });

    if (!isValid) {
        evt.preventDefault();
        return;
    }
});
$(document).ready(function () {
    // Function to check username availability
    function checkUsernameAvailability() {
        var username = $("#username").val();
        var usernameErrorDiv = $("#usernameError"); // Get the div element for username error

        $.post("signup_controller.php", { action: "check_username", username: username }, function (data) {
            if (data === "Username already exists") {
                $("#username").addClass('is-invalid');
                usernameErrorDiv.html(data); // Update error message in the div
            } else {
                $("#username").removeClass('is-invalid');
                usernameErrorDiv.html(''); // Clear the error message in the div
            }
        });
    }
    // Function to check email availability
    function checkEmailAvailability() {
        var email = $("#email").val();
        var emailErrorDiv = $("#emailError"); // Get the div element for email error

        $.post("signup_controller.php", { action: "check_email", email: email }, function (data) {
            if (data === "Email already exists") {
                $("#email").addClass('is-invalid');
                emailErrorDiv.html(data); // Update error message in the div
            } else {
                $("#email").removeClass('is-invalid');
                emailErrorDiv.html(''); // Clear the error message in the div
            }
        });
    }
    // Trigger checks when input fields change
    $("#username").on("input", function () {
        checkUsernameAvailability();
        validateEmptyField($("#username"));
    });

    $("#email").on("input", function () {
        checkEmailAvailability();
        validateEmptyField($("#email"));
    });

    // Handle form submission
    $("#registrationForm").submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Additional validation logic if needed

        // Include 'nationality' in the form data
        var formData = $(this).serializeArray();
        formData.push({ name: "nationality", value: $("#countrySelect").val() });

        // Check for empty fields again before submitting
        var isValid = true;

        formData.forEach(function (item) {
            var field = $("#" + item.name);
            if (!item.value.trim() && item.name !== "countrySelect") {
                isValid = false;
                field.addClass('is-invalid');
                field.next('.invalid-feedback').html('');
            } else {
                field.removeClass('is-invalid');
                field.next('.invalid-feedback').html('');
            }
        });

        if (!isValid) {
            return;
        }

        $.post($(this).attr("action"), formData, function (data) {
            if (data === "Success") {
                // Redirect or show success message
                alert('Your information has been added successfully. You will now be redirected to the login page.');
                window.location = "../views/login.php";
            } else {
                // Handle other error cases if needed
                alert('Error: ' + data);
            }
        });
    });
    // Function to validate empty fields on input change
    function validateEmptyField(field) {
        if (!field.val().trim()) {
            field.addClass('is-invalid');
            field.next('.invalid-feedback').html('');
        } else {
            field.removeClass('is-invalid');
            field.next('.invalid-feedback').html('');
        }
    }
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////
