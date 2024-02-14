/*
  - This is a JS file for the home.php page.
*/

// Check connection 
console.log("Hello");

/* ------------------------------------------------------Break Line------------------------------------------------------ */

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

/* ------------------------------------------------------Break Line------------------------------------------------------ */

window.addEventListener('scroll', function() {
  var logo = document.querySelector('.my_logo');
  if (window.scrollY > 0) {
      logo.style.maxWidth = '200px'; // Set the smaller size when scrolled
  } else {
      logo.style.maxWidth = '250px'; // Set the original size when not scrolled
  }
});

/* ------------------------------------------------------Break Line------------------------------------------------------ */

function toggleMode() {
  var body = document.body;
  var modeToggle = document.getElementById('modeToggle');
  if (modeToggle.checked) {
      body.classList.add('dark-mode');
  } else {
      body.classList.remove('dark-mode');
  }
}

/* ------------------------------------------------------Break Line------------------------------------------------------ */
