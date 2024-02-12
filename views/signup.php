<!--Request Header-->
<title>Codee - Signup</title>
<?php
    require_once('../includes/partials/header.php')
?>

<!-- The content of the page -->
<div class="signup_container h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-between h-100">
            <div class="col-xl-4 p-3 signup_text_side d-flex align-items-center justify-content-center card_shadow">
                <a href="home.php"><img class="signup_text_side_logo" src="../assets/img/codee-logo.png" alt="codee icon"></a> 
            </div>
            <div class="col-xl-2 p-3"></div>
            <div class="col-xl-4 p-3 d-flex align-items-center justify-content-center">
                <form id="registrationForm" class="row g-3 needs-validation" method="post" 
                    action="../controllers/signup_controller.php" novalidate>
                    <div class="form_header">
                        <p class="my_header_font">Register Your Account.</p>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First Name<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom01" name="first_name" placeholder="" pattern="[A-Za-z]+" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last Name<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" name="last_name" placeholder="" pattern="[a-zA-Z]+"  required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Birthdate<span class="red_star">*</span></label>
                        <input type="date" class="form-control" id="validationCustom02" name="birthdate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Nationality<span class="red_star">*</span></label>
                        <select class="form-select" id="countrySelect" name="nationality" required>
                            <option value="" disabled selected>Select a country</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Email<span class="red_star">*</span></label>
                        <input type="email" class="form-control" id="validationCustom01" placeholder="example@domain.com" 
                        pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="email" id="email" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Phone Number<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" name="phone_number" pattern="[0-9-]+" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustomUsername" class="form-label">Username<span class="red_star">*</span></label>
                        <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="" 
                        pattern="^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$" name="username" id="username" required>
                        <div class="invalid-feedback" id="usernameError">
                            Please choose a username that contains letters or numbers or underscore (_) or dot (.)
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Password<span class="red_star">*</span></label>
                        <input type="password" class="form-control" id="validationCustom03" placeholder="" 
                        pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" name="password" required>
                        <div class="invalid-feedback">
                            Please choose a password from 8 that contains at least one capital letter and numbers and special characters
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02" class="form-label">Join us as<span class="red_star">*</span></label>
                        <select name="role" class="form-select" id="validationCustom02" required>
                            <option value="User">User</option>
                            <option value="Developer">Developer</option>
                            <option value="Consultant">Consultant</option>
                        </select>
                    </div>
                    <div class="col-8">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            I agree in <a data-bs-toggle="modal" class="forget_password" data-bs-target="#exampleModal" href="#">terms & conditions</a> of Codee.
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="my_btn1 float-end" type="submit">Sign Up</button>
                    </div>
                    <div class="col-12 text-center">
                        <p>Already have an account? <a class="forget_password" href="login.php">Loign here</a></p> 
                    </div>
                </form>
            </div>
            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>

<!-- Terms & Conditions Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal_header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">CODEE Terms & Conditions</h1>
        <button type="button" id="modal_close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            Welcome to Codee! These Terms and Conditions ("Terms") govern your use of the Codee website (the "Site"). 
            By accessing or using the Site, you agree to be bound by these Terms. 
            If you do not agree to these Terms, please do not use the Site.
        </p>
        <ul>
            <li>
                By accessing or using the Site, you agree to be bound by these Terms 
                and all applicable laws and regulations. If you do not agree with any part of 
                these Terms, you may not use the Site.
            </li>
            <li>
                Codee reserves the right to change, modify, or revise these Terms at any time. 
                The continued use of the Site after any such changes indicates your acceptance of the new Terms.
            </li>
            <li>
                You agree to use the Site for lawful purposes and in a manner consistent with all applicable laws and regulations. 
                You are prohibited from using the Site in any way that could damage, disable, overburden, 
                or impair the Site or interfere with any other party's use and enjoyment of the Site.
            </li>
        </ul>
        <p>
            If you have any questions or concerns about these Terms, please contact us at <a href="mailto:mamdohzx@gmail.com">mamdohzx@gmail.com</a>  
        </p>
        <p>
            Thank you for using Codee!
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="my_btn2" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/signup.js"></script>
<script src="../assets/js/loader.js"></script>

<!--Request Footer-->
<?php
    require_once('../includes/partials/footer.php')
?>