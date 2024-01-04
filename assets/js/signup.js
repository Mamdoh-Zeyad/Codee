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

//Check username & email
$(document).ready(function () {
  // Function to check username availability
  function checkUsernameAvailability() {
      var username = $("#username").val();
      $.post("signup_controller.php", { username: username }, function (data) {
          if (data === "Username already exists") {
              $("#usernameError").html(data);
          } else {
              $("#usernameError").html(""); // Clear error message
          }
      });
  }

  // Function to check email availability
  function checkEmailAvailability() {
      var email = $("#email").val();
      $.post("signup_controller.php", { email: email }, function (data) {
          if (data === "Email already exists") {
              $("#emailError").html(data);
          } else {
              $("#emailError").html(""); // Clear error message
          }
      });
  }

  // Trigger checks when input fields change
  $("#username").on("input", checkUsernameAvailability);
  $("#email").on("input", checkEmailAvailability);

  // Handle form submission
  $("#registrationForm").submit(function (event) {
      event.preventDefault(); // Prevent the form from submitting
      var form = $(this);

      // Additional validation logic if needed

      $.post(form.attr("action"), form.serialize(), function (data) {
          if (data === "Success") {
              alert('Your information has been added successfully. You will now be redirected to the login page.');
              window.location = "../views/login.php";
          } else {
              // Handle other error cases if needed
              alert('Error: ' + data);
          }
      });
  });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////
