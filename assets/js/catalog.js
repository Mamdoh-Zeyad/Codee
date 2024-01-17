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