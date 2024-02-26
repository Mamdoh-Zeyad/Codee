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

// Change the logo's size while scrolling
window.addEventListener('scroll', function() {
  var logo = document.querySelector('.my_logo');
  if (window.scrollY > 0) {
      logo.style.maxWidth = '200px';
  } else {
      logo.style.maxWidth = '250px';
  }
});

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Change the logo's background scrolling
var navbar = document.querySelector('.my_navbar');

function toggleNavbarBackground() {
    if (window.scrollY > 0) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
}

window.addEventListener('scroll', toggleNavbarBackground);

/* ------------------------------------------------------Break Line------------------------------------------------------ */
