<!--Request Header-->
<?php
    require_once('../includes/partials/header.php');
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])
    && isset($_SESSION['birthdate'])&& isset($_SESSION['email'])&& isset($_SESSION['phone_number'])
    && isset($_SESSION['nationality'])&& isset($_SESSION['id'])) {
?>

<!--Home Page Header-->
<nav class="navbar navbar-expand-lg my_navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="text-center">
            <span>
                Hello, <?php 
                        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
                        if($_SESSION['role'] != 'User'){
                        // header("Location: ../views/access_denied.html"); 
                        exit();} 
                        ?>
                | </span> <a title="Logout" href="../controllers/logout_controller.php"><i
                    class="fa-solid fa-right-from-bracket logout_icon"></i> </a>
        </div>
    </div>
</nav>
    <?php   
        include("../includes/mysql_inti.php");   
    ?>

<!-- first section -->
<div class="signup-container mt-4">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-xl-2 p-3"></div>
            <div class="col-xl-8 p-3 card mb-4">
                <div class="row g-3">
                    <div class="form_header mb-1 col-12">
                        <p class="my_header_font mt-4">Developers & Consultants Verification</p>
                    </div>
                    <div class="col-12">
                        <p>Please fill the required fields marked with a red star.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>
    <!-- second section -->
    <div class="signup-container">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-xl-2 p-3"></div>
                <div class="col-xl-8 p-3 d-flex align-items-center justify-content-center card mb-4">
                    <form id="registrationForm" class="row g-3 needs-validation" method="post"
                        action="../controllers/signup_controller.php" novalidate>
                        <div class="form_header mb-1">
                           
                            <p class="my_header_font mt-4">Personal Information</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01" class="form-label">First Name<span
                                    class="red_star">*</span></label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder=""
                                value="<?php echo $_SESSION['first_name']?>" pattern="[a-zA-Z]+" name="first_name"
                                required readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02" class="form-label">Last Name<span
                                    class="red_star">*</span></label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder=""
                                pattern="[a-zA-Z]+" name="last_name" value="<?php echo $_SESSION['last_name']?>"
                                required readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03" class="form-label">Birthdate<span
                                    class="red_star">*</span></label>
                            <input type="date" class="form-control" id="validationCustom03" name="birthdate" required
                                readonly value="<?php echo $_SESSION['birthdate']?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom04" class="form-label">Nationality<span
                                    class="red_star">*</span></label>
                            <!-- <select name="nationalitydisabled" class="form-select" id="countrySelectdisabled" required disabled>
                                <option disabled selected>Select a country</option>
                            </select> -->
                            <input type="text" class="form-control" id="nationality" name="nationality"  value="<?php echo $_SESSION['nationality']?>" 
                            readonly required >
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom05" class="form-label">Email<span
                                    class="red_star">*</span></label>
                            <input type="email" class="form-control" id="validationCustom05"
                                placeholder="example@domain.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="email"
                                id="email" required readonly value="<?php echo $_SESSION['email']?>">
                            <span id="emailError"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom06" class="form-label">Phone Number<span
                                    class="red_star">*</span></label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="validationCustom06"
                                    aria-describedby="inputGroupPrepend" placeholder="" name="phone_number" required
                                    readonly value="<?php echo $_SESSION['phone_number']?>">
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01" class="form-label" hidden>ID<span
                                    class="red_star">*</span></label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder=""
                                value="<?php echo $_SESSION['id']?>" pattern="[a-zA-Z]+" name="user_id"
                                required readonly hidden>
                        </div>
                    </form>
                </div>

                <div class="col-xl-2 p-3"></div>
            </div>
        </div>
    </div>


    <!-- 3rd section -->
    <div class="signup-container">
        <div class="container-fluid">
            <div class="row justify-content-between">

                <div class="col-xl-2 p-3"></div>

                <div class="col-xl-8 p-3 d-flex align-items-center justify-content-center card mb-4 ">
                    <form id="skillsForm" class="row g-3 needs-validation" method="post"
                        action="../controllers/verifiction_controller.php" novalidate>
                        <div class="form_header mb-1">
                            <p class="my_header_font mt-4">Education & Development Skills</p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01" class="form-label">Higher Degree (Upload Certification)<span
                                    class="red_star">*</span></label>
                                 <select name="Certification" class="form-select" id="validationCustom02" required>
                                    <option value="bachelors">Bachelor's</option>
                                    <option value="master">Master's Degree</option>
                                    <option value="doctorate">Doctorate (Ph.D)</option>
                                    <option value="professional_doctorate">Professional Doctorate</option>
                                    <option value="diploma">Postgraduate Diploma or Certificate</option>
                        </select>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="validationCustom02" class="form-label">Country of the Higher Degree<span class="red_star">*</span></label>
                        <select name="country_higher_degree" class="form-select" id="countrySelect" required>
                            <option value="" disabled selected>Select a country</option>
                        </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="validationCustom02" class="form-label">Major<span
                                    class="red_star">*</span></label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Software Engineering"
                                   pattern="[a-zA-Z ]*" name="Major" required>
                        </div>

                        <div class="col-md-1 mb-3">
                            <label for="validationCustom02" class="form-label">GPA<span
                                    class="red_star">*</span></label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="4.5"
                            pattern="[0-9]+(\.[0-9]+)?" name="GPA" required>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01" class="form-label">Programming Experience<span
                                    class="red_star">*</span></label>
                                 <select name="programming_experience" class="form-select" id="validationCustom02" required>
                                    <option value="more_10_years">More then 10 years</option>
                                    <option value="one_years">one years</option>
                                    <option value="more_3_years">More then 3 years</option>
                                    <option value="more_5_years">More then 5 years</option>
                                   
                        </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01" class="form-label">Choose development category<span
                                    class="red_star">*</span></label>
                                 <select name="development_category" class="form-select" id="validationCustom02" required>
                                    <option value="back_end">Back-End Development</option>
                                    <option value="front_end">Front-End Development</option>
                                    <option value="full-stack">Full-Stack Development</option>        
                                   
                        </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01" class="form-label">Preferd Programming Language<span
                                    class="red_star">*</span></label>
                                 <select name="preferd_programming_language" class="form-select" id="validationCustom02" required>
                                    <option value="php">PHP</option>
                                    <option value="java">JAVA</option>
                                    <option value="ptyhon">Python</option>   
                                    <option value="c">C#</option> 
                                    <option value="asp">ASP.Net</option>  
                                    <option value="js">Java Script</option>        
                        </select>
                        </div>
                        <label for="floatingTextarea2">Write a brief about your development experience<span
                                    class="red_star">*</span></label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="experience" required></textarea>
                            <label for="floatingTextarea2">ex: write about your programming languages, certifications you have etc.</label>
                        </div>

                  
                </div>

                <div class="col-xl-2 p-3"></div>
            </div>
        </div>
    </div>


    <!-- 4th section -->
    <div class="signup-container">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-xl-2 p-3"></div>

            <div class="col-xl-8 p-3 card mb-4">
                <div class="row g-3">
                    <div class="form_header mb-1 col-12 ps-5">
                        <p class="my_header_font mt-4 ">Submit Your Form</p>
                    </div>

                    <div class="col-md-7 text-align-center ps-5">
                        <label for="file" class="list_group_color">Please upload the following files:</label>
                        <ul class="ps-4 mt-2 files list-group">
                            <li class="certification">Higher degree certification. </li>
                            <li class="cv">Your CV.</li>
                            <li class="any_certifications">Any development certifications you have.</li>
                        </ul>
                    </div>

                    <div class="col-md-5 mt-3">
                        <div class="upload-container">
                            <input type="file" name="file" id="file" hidden>
                            <label class="upload-button" for="file">  <i class="fa-solid fa-arrow-up-from-bracket"></i> Upload Files</label>
                            <span id="file-chosen">No file chosen</span>
                        </div>
                        <button class="my_btn1 mt-3 btn-lg col-9" type="submit">Submit</button>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>



<!--Start Home Page Footer-->
<div class="home_footer">
    <p>&copy; 2023 Codee - All Rights Reserved</p>
</div>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/verifiction.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>