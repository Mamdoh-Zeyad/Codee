/*
  - This is a JS file for the admin.php page.
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

$(document).ready(function () {
    $('.edit_icon').on('click', function () {
        var userId = $(this).data('id');

        // AJAX request to fetch user info by ID
        $.ajax({
            url: 'http://localhost/codee/controllers/admin/fetch_user_info.php', // Change this to the actual PHP file to fetch user info
            method: 'POST',
            data: { id: userId },
            success: function (response) {
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
        const isConfirmed = confirm("Are you sure you want to delete this user?");
        if (isConfirmed) {
            window.location.href = "../controllers/admin/delete_user.php?id=" + userId;
        }
    });
    $('.verify_icon').on('click', function () {
      var userId = $(this).data('id');
      $.ajax({
          url: 'http://localhost/codee/controllers/admin/fetch_request_info.php', // Change this to the actual PHP file to fetch user info
          method: 'POST',
          data: { id: userId },
          success: function (response) {
              var userInfo = JSON.parse(response);
              $('#exampleModal1 input[name="user_id"]').val(userInfo.user_id);
              $('#exampleModal1 input[name="Certification"]').val(userInfo.Certification);
              $('#exampleModal1 input[name="country_higher_degree"]').val(userInfo.country_higher_degree);
              $('#exampleModal1 input[name="Major"]').val(userInfo.Major);
              $('#exampleModal1 input[name="GPA"]').val(userInfo.GPA);
              $('#exampleModal1 input[name="programming_experience"]').val(userInfo.programming_experience);
              $('#exampleModal1 input[name="development_category"]').val(userInfo.development_category);
              $('#exampleModal1 input[name="preferd_programming_language"]').val(userInfo.preferd_programming_language);
              $('#exampleModal1 textarea[name="experience"]').val(userInfo.experience);
              $('#exampleModal1 p a').attr('href', userInfo.file);
          },
          error: function (error) {
              console.log('Error fetching user info:', error);
          }
      });
  });
});

/* ------------------------------------------------------Break Line------------------------------------------------------ */
