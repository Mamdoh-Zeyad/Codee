<!--Request Header-->
<title>Codee - Verification Request</title>
<?php
    require_once('../includes/partials/header.php');
    include("../includes/functions.php");
    session_start();
    if (
        isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])
        && isset($_SESSION['birthdate']) && isset($_SESSION['email']) && isset($_SESSION['phone_number'])
        && isset($_SESSION['nationality']) && isset($_SESSION['id'])
    ) {
?>

<!--Home Page Header-->
<nav class="navbar my_navbar2">
    <div class="container">
        <a class="navbar-brand" href="home.php"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
        <button class="my_btn1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class=" text-center sidebar_body">
                <div class="my_nav">
                    <a class="nav-link active" aria-current="page" href="#"><img class="profile_img" src="../chat/php/images/<?php echo $_SESSION['img']; ?>" alt=""></a>
                    <?php
                    displayDevConDropdownMenu('Developer', 'Consultant');
                    ?>
                </div>
                <div class="my_nav">
                    <a class="nav-link active" aria-current="page" href="catalog.php"><i class="fa-solid fa-users-viewfinder fa-2x"></i></a>
                    <a class="nav-link active" aria-current="page" href="catalog.php">Catalog</a>
                </div>
                <div class="my_nav">
                    <a class="nav-link active" aria-current="page" href="../chat/users.php"><i class="fa-solid fa-comment fa-2x"></i></a>
                    <a class="nav-link active" aria-current="page" href="../chat/users.php">Chatting</a>
                </div>
                <?php
                if ($_SESSION['role'] === 'Developer') {
                    echo "<div class='my_nav'>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'><i class='fa-solid fa-code fa-2x'></i></a>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'>Development Area</a></div>";
                }
                ?>
                <div class="my_nav">
                    <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php?logout_username=<?php echo $_SESSION['username']; ?>"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
                    <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php?logout_username=<?php echo $_SESSION['username']; ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- first section -->
<div class="signup-container mt-4 animate__animated animate__fadeInLeft">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-xl-2 p-3"></div>
            <div class="col-xl-8 p-3 card mb-4 card_shadow">
                <div class="row g-3">
                    <div class="form_header mb-1 col-12">
                        <p class="my_header_font">Developers & Consultants Verification</p>
                        <p class="light_font">Please fill in the required fields marked with a
                            <span class="red_star">red star.</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>

<!-- second section -->
<div class="signup-container animate__animated animate__fadeInLeft">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-xl-2 p-3"></div>
            <div class="col-xl-8 p-3 d-flex align-items-center justify-content-center card mb-4 card_shadow">
                <form id="registrationForm" class="row g-3 needs-validation" method="post" action="../controllers/signup_controller.php" novalidate>
                    <div class="form_header mb-1">
                        <p class="my_header_font mt-4">Personal Information</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01" class="form-label">First Name<span class="red_star"> (readonly)</span></label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="" value="<?php echo $_SESSION['first_name'] ?>" pattern="[a-zA-Z]+" name="first_name" required readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02" class="form-label">Last Name<span class="red_star"> (readonly)</span></label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="" pattern="[a-zA-Z]+" name="last_name" value="<?php echo $_SESSION['last_name'] ?>" required readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03" class="form-label">Birthdate<span class="red_star"> (readonly)</span></label>
                        <input type="date" class="form-control" id="validationCustom03" name="birthdate" required readonly value="<?php echo $_SESSION['birthdate'] ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04" class="form-label">Nationality<span class="red_star"> (readonly)</span></label>
                        <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $_SESSION['nationality'] ?>" readonly required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom05" class="form-label">Email<span class="red_star"> (readonly)</span></label>
                        <input type="email" class="form-control" id="validationCustom05" placeholder="example@domain.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="email" id="email" required readonly value="<?php echo $_SESSION['email'] ?>">
                        <span id="emailError"></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom06" class="form-label">Phone Number<span class="red_star"> (readonly)</span></label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="validationCustom06" aria-describedby="inputGroupPrepend" placeholder="" name="phone_number" required readonly value="<?php echo $_SESSION['phone_number'] ?>">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>

<!-- 3rd section -->
<div class="signup-container animate__animated animate__fadeInLeft">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-xl-2 p-3"></div>
            <div class="col-xl-8 p-3 d-flex align-items-center justify-content-center card mb-4 card_shadow">
                <form id="skillsForm" class="row g-3 needs-validation" method="post" action="../controllers/verifiction_controller.php" novalidate enctype="multipart/form-data">
                    <div class="form_header mb-1">
                        <p class="my_header_font mt-4">Education & Development Skills</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01" class="form-label">Higher Degree (Upload Certification)<span class="red_star">*</span></label>
                        <select name="Certification" class="form-select" id="validationCustom02" required>
                            <option value="bachelors">Bachelor's</option>
                            <option value="master">Master's Degree</option>
                            <option value="doctorate">Doctorate (Ph.D)</option>
                            <option value="professional_doctorate">Professional Doctorate</option>
                            <option value="diploma">Postgraduate Diploma or Certificate</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02" class="form-label">Country of the Higher Degree
                            <span class="red_star">*</span></label>
                        <select name="country_higher_degree" class="form-select" id="countrySelect" required>
                            <option value="" disabled selected>Select a country</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02" class="form-label">Major<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Software Engineering" pattern="[a-zA-Z ]*" name="Major" required>
                    </div>
                    <div class="col-md-1 mb-3">
                        <label for="validationCustom02" class="form-label">GPA<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="4.5" pattern="[0-9]+(\.[0-9]+)?" name="GPA" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01" class="form-label">Programming Experience<span class="red_star">*</span></label>
                        <select name="programming_experience" class="form-select" id="validationCustom02" required>
                            <option value="one_years">one year</option>
                            <option value="more_3_years">More than 3 years</option>
                            <option value="more_5_years">More than 5 years</option>
                            <option value="more_10_years">More then 10 years</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01" class="form-label">Choose development category<span class="red_star">*</span></label>
                        <select name="development_category" class="form-select" id="validationCustom02" required>
                            <option value="back_end">Back-End Development</option>
                            <option value="front_end">Front-End Development</option>
                            <option value="full-stack">Full-Stack Development</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01" class="form-label">Preferd Programming Language<span class="red_star">*</span></label>
                        <select name="preferd_programming_language" class="form-select" id="validationCustom02" required>
                            <option value="php">PHP</option>
                            <option value="java">JAVA</option>
                            <option value="ptyhon">Python</option>
                            <option value="C#">C#</option>
                            <option value="asp.net">ASP.Net</option>
                            <option value="js">Java Script</option>
                        </select>
                    </div>
                    <div>
                        <label for="floatingTextarea2">Write a brief about your development experience<span class="red_star">*</span></label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="experience" required></textarea>
                            <label for="floatingTextarea2">ex: write about your programming languages, certifications you have etc.</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label hidden for="validationCustom01" class="form-label">ID<span class="red_star"> (readonly)</span></label>
                        <input hidden type="text" class="form-control" id="validationCustom01" placeholder="" value="<?php echo $_SESSION['id'] ?>" pattern="[a-zA-Z]+" name="user_id" required readonly>
                        <h6>Please Upload the following files: </h3>
                            <ul>
                                <li><label for="file" class="">Your CV as a PDF file</label><span class="red_star">*</span></li>
                            </ul>

                    </div>
                    <div class="col-md-7 ">
                        <div class="upload-container float-end">
                            <span id="file-chosen">No file chosen</span>
                            <input type="file" name="file" id="file" hidden>
                            <label class="upload-button" for="file"> <i class="fa-solid fa-arrow-up-from-bracket"></i> Upload Files</label>
                            <button class="upload-button" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-2 p-3"></div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
displayFooter();
?>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/verifiction.js"></script>

<!--Request Footer-->
<?php
    } else {
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>