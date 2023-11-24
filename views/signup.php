<!--Request Header-->
<?php
require_once('../includes/partials/header.php')
?>
<div class="signup_container h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-between h-100">
            <div class="col-xl-4 p-3 signup_text_side d-flex align-items-center justify-content-center">
                <img class="signup_text_side_logo" src="../assets/img/codee-logo.png" alt="codee icon">
            </div>
            <div class="col-xl-2 p-3"></div>
            <div class="col-xl-4 p-3 d-flex align-items-center justify-content-center">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="form_header">
                        <p class="my_header_font">Register Your Account.</p>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First name<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Letters Only" pattern="[a-zA-Z]+" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last name<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Letters Only" pattern="[a-zA-Z]+" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Birthdate<span class="red_star">*</span></label>
                        <input type="date" class="form-control" id="validationCustom02" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Nationality<span class="red_star">*</span></label>
                        <select name="nationality" class="form-select" id="validationCustom02" required>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Syria">Syria</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Email<span class="red_star">*</span></label>
                        <input type="email" class="form-control" id="validationCustom01" placeholder="example@domain.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Phone Number<span class="red_star">*</span></label>
                        <div class="input-group has-validation">
                        <select name="country_code" class="input-group-text form-select-sm" id="inputGroupPrepend" required>
                            <option value="+966">+966</option>
                            <option value="+970">+970</option>
                            <option value="+963">+963</option>
                        </select>    
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="Numbers Only" pattern="[0-9]+" maxlength="9" minlength="9" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustomUsername" class="form-label">Username<span class="red_star">*</span></label>
                        <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="mamdoh_zeyad" pattern="^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$" required>
                        <div class="invalid-feedback">
                            Please choose a username that contains letters or numbers or underscore (_) or dot (.)
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Password<span class="red_star">*</span></label>
                        <input type="password" class="form-control" id="validationCustom03" placeholder="Admin@123456" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required>
                        <div class="invalid-feedback">
                        Please choose a password from 8 that contains at least one capital letter and numbers and special characters

                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom02" class="form-label">Join us as<span class="red_star">*</span></label>
                        <select name="Role" class="form-select" id="validationCustom02" required>
                            <option value="User">User</option>
                            <option value="Developer">Developer</option>
                            <option value="Consultant">Consultant</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            I agree in <a href="#">terms & conditions</a> of Codee.
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <button class="my_btn1 float-end" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>

<?php
require_once('../includes/partials/footer.php')
?>