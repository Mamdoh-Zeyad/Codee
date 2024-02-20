/*
  - This is a JS file for the signup.php page.
*/

//Check connection 
console.log("Hello");

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Scripts for form validation. 
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
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

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Scripts for displaying alert when submitting the form.
document.getElementById("registrationForm").addEventListener('submit', function(evt){
  if(window.confirm("Are you sure you want to submit the form?") == false){
      evt.preventDefault();
  }
});

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Scripts for calling country API.
const countrySelect = document.getElementById('countrySelect');
fetch('https://restcountries.com/v3.1/all')
    .then(response => response.json())
    .then(countries => {
    countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country.name.common;
        option.textContent = `${country.name.common} (${country.cca2})`;
        countrySelect.appendChild(option);
    });
})
.catch(error => console.error('Error fetching countries:', error));

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Scripts for validating the form.
// document.getElementById("registrationForm").addEventListener('submit', function (evt) {
//     var isValid = true;
//     document.querySelectorAll('.needs-validation :required').forEach(function (field) {
//         if (!field.value.trim()) {
//             isValid = false;
//             field.classList.add('is-invalid');
//             field.nextElementSibling.innerHTML = 'Please fill in this field.';
//         } else {
//             field.classList.remove('is-invalid');
//             field.nextElementSibling.innerHTML = '';
//         }
//     });
//     if (!isValid) {
//         evt.preventDefault();
//         return;
//     }
// });
// $(document).ready(function () {
//     // Function to check username availability
//     function checkUsernameAvailability() {
//         var username = $("#username").val();
//         var usernameErrorDiv = $("#usernameError");
//         $.post("signup_controller.php", { action: "check_username", username: username }, function (data) {
//             if (data === "Username already exists") {
//                 $("#username").addClass('is-invalid');
//                 usernameErrorDiv.html(data);
//             } else {
//                 $("#username").removeClass('is-invalid');
//                 usernameErrorDiv.html('');
//             }
//         });
//     }
//     // Function to check email availability
//     function checkEmailAvailability() {
//         var email = $("#email").val();
//         var emailErrorDiv = $("#emailError");
//         $.post("signup_controller.php", { action: "check_email", email: email }, function (data) {
//             if (data === "Email already exists") {
//                 $("#email").addClass('is-invalid');
//                 emailErrorDiv.html(data);
//             } else {
//                 $("#email").removeClass('is-invalid');
//                 emailErrorDiv.html('');
//             }
//         });
//     }
//     $("#username").on("input", function () {
//         checkUsernameAvailability();
//         validateEmptyField($("#username"));
//     });

//     $("#email").on("input", function () {
//         checkEmailAvailability();
//         validateEmptyField($("#email"));
//     });

//     $("#registrationForm").submit(function (event) {
//         event.preventDefault();

//         var formData = $(this).serializeArray();
//         formData.push({ name: "nationality", value: $("#countrySelect").val() });

//         var isValid = true;

//         formData.forEach(function (item) {
//             var field = $("#" + item.name);
//             if (!item.value.trim() && item.name !== "countrySelect") {
//                 isValid = false;
//                 field.addClass('is-invalid');
//                 field.next('.invalid-feedback').html('');
//             } else {
//                 field.removeClass('is-invalid');
//                 field.next('.invalid-feedback').html('');
//             }
//         });
//         if (!isValid) {
//             return;
//         }
//         $.post($(this).attr("action"), formData, function (data) {
//             if (data === "Success") {
//                 alert('Your information has been added successfully. You will now be redirected to the login page.');
//                 window.location = "../views/login.php";
//             } else {
//                 alert('Error: ' + data);
//             }
//         });
//     });
//     function validateEmptyField(field) {
//         if (!field.val().trim()) {
//             field.addClass('is-invalid');
//             field.next('.invalid-feedback').html('');
//         } else {
//             field.removeClass('is-invalid');
//             field.next('.invalid-feedback').html('');
//         }
//     }
// });

/* ------------------------------------------------------Break Line------------------------------------------------------ */

