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


