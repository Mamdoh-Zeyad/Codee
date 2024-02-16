<!--Request Header-->
<title>Codee - Login</title>
<?php
    require_once('../includes/partials/header.php')
?>
<!-- The content of the page -->
<div class="login_body h-100 d-flex justify-content-center align-items-center">
    <div class="container  d-flex justify-content-center align-items-center">
        <div class="col-md-8 animate__animated">
            <div class=" login_container animate__animated animate__fadeInLeft">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 p-3 signup_text_side d-flex align-items-center justify-content-center">
                            <a href="home.php"><img src="../assets/img/codee-logo - Copy.png" alt="Logo" class="caption_logo"></a>
                        </div>
                        <div class="card col-xl-8">
                            <div class="col-xl-12 p-5 d-flex align-items-center justify-content-center">
                                <form class="row g-3 needs-validation" method="post" action="../controllers/login_controller.php" novalidate>
                                    <?php 
                                        if (isset($_GET['error'])) { ?>
                                        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
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
                                    <div class="col-12">
                                        <button class="my_btn1" type="submit">Login</button>
                                        <a class="forget_password" href="../mailer/reset.php">Forget Password?</a>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p>Don't have an account? <a class="forget_password" href="signup.php">Sign up here</a></p> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/login.js"></script>

<!--Request Footer-->
<?php
    require_once('../includes/partials/footer.php')
?>