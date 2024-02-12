/*
  - This is a JS file for the reset.php page.
*/

//Check connection 
console.log("Hello");

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Scripts for form validation. 
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

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Scripts for fetching the loader
window.addEventListener('load', function() {
  // Fetch and append the loader content
  fetch('../views/loader.php')
    .then(response => response.text())
    .then(loaderContent => {
      const loaderContainer = document.createElement('div');
      loaderContainer.innerHTML = loaderContent;
      document.body.appendChild(loaderContainer);

      // Fade out and remove the loader after the page loads
      loaderContainer.addEventListener('animationend', function() {
        this.remove();
      });
    });
});

/* ------------------------------------------------------Break Line------------------------------------------------------ */
