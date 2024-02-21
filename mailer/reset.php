<!--Request Header-->
<title>Codee - Reset Password</title>
<?php
    require_once('../includes/partials/header.php')
?>
<!-- Page Content -->
<?php 
    if(!isset($_GET['code'])){
        echo '
        <div class="login_body d-flex justify-content-center align-items-center">
            <div class="container  d-flex justify-content-center align-items-center">
                <div class="col-md-8 animate__animated">
                    <div class=" login_container animate__animated animate__fadeInLeft">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <div class="col-xl-4 p-3 signup_text_side d-flex align-items-center justify-content-center">
                                    <a href="../views/home.php"><img src="../assets/img/codee-logo - Copy.png" alt="Logo" class="caption_logo"></a>
                                </div>
                                <div class="card col-xl-8">
                                    <div class="col-xl-12 p-5 d-flex align-items-center justify-content-center">
                                        <form method="post" class="needs-validation" novalidate>';
                                            if(isset($_POST['resetPassword'])){
                                                $username ="root";
                                                $password ="";
                                                $database = new PDO ("mysql:host=localhost; dbname=codeedb;",$username,$password);
                                                $checkEmail = $database->prepare("SELECT email FROM users WHERE email=:email");
                                                $checkEmail->bindparam("email",$_POST['email']);
                                                $checkEmail->execute();
                                                if($checkEmail->rowCount() > 0){
                                                    require_once 'mail.php';
                                                    $user =$checkEmail->fetchObject();
                                        
                                                    $mail->addAddress($_POST['email']);
                                                    $mail->Subject ="Reset Your Password in Codee";
                                                    $mail->Body = '
                                                    Dear User of Codee,
                                                    <br><br>
                                                    Enter the link to reset your password or ignore the message if you remember your password:
                                                    <br>
                                                    ' . '<a href="http://localhost/CODEE/mailer/reset.php?email='.$_POST['email'].
                                                    '&code='. '">http://localhost/App/reset.php?email='.$_POST['email']. 
                                                    '&code='.'</a>';
                                                    $mail->setFrom("Codee@gmail.com", "Codee");
                                                    $mail->send();
                                                        echo '<div class="alert alert-success"> The Link has been sent to your mail successfully. </div>'; 
                                                }else{
                                                    echo'<div class="alert alert-danger"> This is invalid mail! </div>';
                                                }
                                            }
                                            echo'<div class="form-group">
                                                <label for="validationCustom01" class="form-label">Enter your email<span class="red_star">*</span></label>
                                                <input type="email" class="form-control" id="validationCustom01" placeholder="example@domain.com" aria-describedby="inputGroupPrepend" name="email" required>
                                            </div>
                                            <div class="text-end mt-3">
                                                <button class="my_btn1" type="submit" name="resetPassword" >
                                                    Send the URL
                                                </button> 
                                            </div>
                                            <div class="col-12 text-center mt-3">
                                                <p>Remember your password? <a class="forget_password" href="../views/login.php">Login again here</a></p> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }else if(isset($_GET['code']) && isset($_GET['email'])){
        echo '
        <div class="login_body d-flex justify-content-center align-items-center">
            <div class="container  d-flex justify-content-center align-items-center">
                <div class="col-md-8 animate__animated">
                    <div class=" login_container animate__animated animate__fadeInLeft">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <div class="col-xl-4 p-3 signup_text_side d-flex align-items-center justify-content-center">
                                    <a href="../views/home.php"><img src="../assets/img/codee-logo - Copy.png" alt="Logo" class="caption_logo"></a>
                                </div>
                                <div class="card col-xl-8">
                                    <div class="col-xl-12 p-5 d-flex align-items-center justify-content-center">
                                    <form method="post" class="needs-validation" novalidate>';
                                        if(isset($_POST['newPassword'])){
                                            $username = "root";
                                            $password = "";
                                            $database = new PDO ("mysql:host=localhost; dbname=codeedb;",$username,$password);
                                            
                                            $updatePassword = $database->prepare("UPDATE users SET password = :password WHERE email = :email");
                                            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                            $updatePassword->bindParam("password",$hashed_password);
                                            $updatePassword->bindParam("email",$_GET['email']);
                                        
                                            if($updatePassword->execute()){
                                                echo '<div class="alert alert-success text-right"> Your password changed successfully. </div>';
                                                header("Location: ../views/login.php");
                                                exit();
                                            }else{
                                                echo'<div class="alert alert-danger text-right"> Password reset failed please try again! </div>';
                                            }
                                        }
                                        echo'
                                        <div class="form-group">
                                            <label for="validationCustom03" class="form-label">Enter your new password<span class="red_star">*</span></label>
                                            <input type="password" class="form-control" id="validationCustom03" placeholder="" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" name="password" required>
                                            <div class="invalid-feedback">
                                                Please choose a password from 8 that contains at least one capital letter and numbers and special characters
                                            </div>
                                        </div>
                                        <div class="text-end mt-3">
                                            <button class="my_btn1" type="submit" name="newPassword" >
                                                Change Password
                                            </button> 
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <p>Remember your password? <a class="forget_password" href="../views/login.php">Login again here</a></p> 
                                        </div>
                                     </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';                         
    }
?>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/reset.js"></script>

<!--Request Footer-->
<?php
    require_once('../includes/partials/footer.php')
?>