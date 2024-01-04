<!--Request Header-->
<?php
    require_once('../includes/partials/header.php')
?>

<div class="login_container h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-between h-100">
            <div class="col-xl-4 p-3 signup_text_side d-flex align-items-center justify-content-center">
                <img class="signup_text_side_logo" src="../assets/img/codee-logo.png" alt="codee icon">
            </div>
            <div class="col-xl-2 p-3"></div>
            <div class="col-xl-4 p-3 d-flex align-items-center justify-content-center">
                <form class="row g-3 needs-validation" method="post" action="../controllers/login_controller.php" novalidate>
                    <?php 
                        if (isset($_GET['error'])) { ?>
                        <p class="login_error">
                            <?php echo $_GET['error']; ?>
                        </p>
                    <?php } ?>
                    <div class="form_header">
                        <p class="my_header_font">Login To Your Account.</p>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Username<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom01"  id="username" name="username">
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Password<span class="red_star">*</span></label>
                        <input type="password" class="form-control" id="validationCustom03" id="password" name="password">
                    </div>
                    <div class="col-3">
                        <button class="my_btn1" type="submit">Login</button>
                    </div>
                    <div class="col-9">
                        <div class="forget_password_div">
                            <a class="forget_password" href="">Forget Password?</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/login.js"></script>

<!--Request Footer-->
<?php
    require_once('../includes/partials/footer.php')
?>