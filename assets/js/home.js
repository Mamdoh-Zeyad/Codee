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

// Scripts for scroll to top function
let mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

document.getElementById("contact_form").addEventListener('submit', function(evt){
  if(window.confirm("Are you sure you want to submit the form?") == false){
      evt.preventDefault();
  }
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////

window.addEventListener('load', function() {
  // Fetch and append the loader content
  fetch('loader.html')
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