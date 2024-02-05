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

$(document).ready(function () {
    $('.edit_icon').on('click', function () {
        var userId = $(this).data('id');

        // AJAX request to fetch user info by ID
        $.ajax({
            url: 'http://localhost/codee/controllers/admin/fetch_user_info.php', // Change this to the actual PHP file to fetch user info
            method: 'POST',
            data: { id: userId },
            success: function (response) {
                // Populate modal fields with fetched user info
                var userInfo = JSON.parse(response);
                $('#exampleModal input[name="id"]').val(userInfo.id);
                $('#exampleModal input[name="first_name"]').val(userInfo.first_name);
                $('#exampleModal input[name="last_name"]').val(userInfo.last_name);
                $('#exampleModal input[name="birthdate"]').val(userInfo.birthdate);
                $('#exampleModal input[name="email"]').val(userInfo.email);
                $('#exampleModal input[name="phone_number"]').val(userInfo.phone_number);
                $('#exampleModal input[name="username"]').val(userInfo.username);
            },
            error: function (error) {
                console.log('Error fetching user info:', error);
            }
        });
    });
    $('.delete_icon').on('click', function () {
        const userId = this.getAttribute("data-id");
        // Ask for confirmation before deleting
        const isConfirmed = confirm("Are you sure you want to delete this user?");
        if (isConfirmed) {
            // Perform the delete action (you may use AJAX to send a delete request)
            window.location.href = "../controllers/admin/delete_user.php?id=" + userId;
        }
    });
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
