/*
  - This is a JS file for the loader.php page.
*/

// Check connection 
console.log("Hello");

/* ------------------------------------------------------Break Line------------------------------------------------------ */

// Scripts for fetching the loader
window.addEventListener('load', function() {
    // Fetch and append the loader content
    fetch('loader.php')
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
