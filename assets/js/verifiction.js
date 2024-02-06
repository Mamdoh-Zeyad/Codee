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

document.getElementById("skillsForm").addEventListener('submit', function(evt){
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
        option.value = country.name.common; // Use the country code as the value
        option.textContent = `${country.name.common} (${country.cca2})`;
        countrySelect.appendChild(option);
    });
})
.catch(error => console.error('Error fetching countries:', error));


///////////////////////////////////////////////////////////////////////////////////////////////////////////

document.getElementById("skillsForm").addEventListener('submit', function (evt) {
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

    //Upload Button Style
    const actualBtn = document.getElementById('file');
    const fileChosen = document.getElementById('file-chosen');
    actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
    });
    

    // Handle form submission
    // $("#registrationForm").submit(function (event) {
    //     event.preventDefault(); // Prevent the form from submitting

    //     // Additional validation logic if needed

    //     // Include 'country_higher_degree' in the form data
    //     var formData = $(this).serializeArray();
    //     formData.push({ name: "country_higher_degree", value: $("#countrySelect").val() });

    //     // Check for empty fields again before submitting
    //     var isValid = true;

    //     formData.forEach(function (item) {
    //         var field = $("#" + item.name);
    //         if (!item.value.trim() && item.name !== "countrySelect") {
    //             isValid = false;
    //             field.addClass('is-invalid');
    //             field.next('.invalid-feedback').html('');
    //         } else {
    //             field.removeClass('is-invalid');
    //             field.next('.invalid-feedback').html('');
    //         }
    //     });

    //     if (!isValid) {
    //         return;
    //     }

    //     $.post($(this).attr("action"), formData, function (data) {
    //         if (data === "Success") {
    //             // Redirect or show success message
    //             alert('Your information has been added successfully. You will now be redirected to the login page.');
    //             window.location = "../views/login.php";
    //         } else {
    //             // Handle other error cases if needed
    //             alert('Error: ' + data);
    //         }
    //     });
    // });
    // // Function to validate empty fields on input change
    // function validateEmptyField(field) {
    //     if (!field.val().trim()) {
    //         field.addClass('is-invalid');
    //         field.next('.invalid-feedback').html('');
    //     } else {
    //         field.removeClass('is-invalid');
    //         field.next('.invalid-feedback').html('');
    //     }
    // }

    



// validation for file
// const input = document.querySelector('file');
// const userInfo = document.getElementById('file-chosen');
// function validateSize(){
//     const file = input.files[0];
//     if(!file){
//         const err = new Error("No file selected");
//         userInfo.textContent = err.message;
//         return err;
//     }

//     const limit = 2000;
//     const size = Math.round(file.size/1024);
//     if (size < limit) {
//         alert(`File size OK: ${size} bytes`);
//     } else {
//         alert(`Error: File larger than 2MB (${(size/1000).toFixed(2)} MB)`);
//         throw new Error(`File too large: ${size} bytes`);
//     }
//   }




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
