<!--Request Header-->
<title>Codee - Catalog</title>
<?php
    require_once('../includes/partials/header.php');
    include("../includes/functions.php");
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
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
            <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-user fa-2x"></i></a>
            <?php
                displayOtherDropdownMenu('Admin');
            ?>
            </div>
            <div class="my_nav">
            <a class="nav-link active" aria-current="page" href="catalog.php"><i class="fa-solid fa-users-viewfinder fa-2x"></i></a>
            <a class="nav-link active" aria-current="page" href="catalog.php">Catalog</a>
            </div>
            <div class="my_nav">
            <a class="nav-link active" aria-current="page" href="chat.php"><i class="fa-solid fa-comment fa-2x"></i></a>
            <a class="nav-link active" aria-current="page" href="chat.php">Chatting</a>
            </div>
            <?php
                if($_SESSION['role'] === 'Developer'){
                    echo "<div class='my_nav'>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'><i class='fa-solid fa-code fa-2x'></i></a>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'>Development Area</a></div>";
                }
            ?>
            <div class="my_nav">
            <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
            <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php">Logout</a>
            </div>
            <div class="my_nav_toggle">
            <label class="toggle">
                <input type="checkbox" id="modeToggle" onclick="toggleMode()">
                <span class="slider"></span>
            </label>
            </div>
        </div>
        </div>
    </div>
</nav>

<!-- catalog content -->
<div class="catalog_content">
    <div class="container mt-4">
        <div class="form_header card p-3 mt-4 mb-4 card_shadow">
            <p class="my_header_font">Developers & Consultants Catalog.</p>
            <p class="light_font">Use the services of the best programmers around the world.</p>
            <?php
                if(($_SESSION['role'] === 'Developer' || $_SESSION['role'] === 'Consultant') && 
                $_SESSION['status'] === "Inactive"){
                    echo "
                    <div class='container'>
                        <div class='row justify-content-start my_alert'>
                            <div class='col-8'>
                                <p class='pt-1'>
                                    To join as a developer in our community you must verify your account to appear in the catalog.
                                </p>
                            </div>
                            <div class='col-4'>
                                <button class='my_btn1 float-end' type='submit'><a href='verifiction.php'>Verify Account</a></button> 
                            </div>
                        </div>
                    </div>";
                }
                else if (($_SESSION['role'] === 'Developer' || $_SESSION['role'] === 'Consultant') 
                && $_SESSION['status'] === "Pending"){
                    echo "
                    <div class='container'>
                        <div class='row justify-content-start my_alert2'>
                            <div class='col-8'>
                                <p class='pt-1'>
                                    Thank you for submitting the form, just be patient we are verifying your account!
                                </p>
                            </div>
                        </div>
                    </div>";
                }
                else if (($_SESSION['role'] === 'Developer' || $_SESSION['role'] === 'Consultant') 
                && $_SESSION['status'] === "Active"){
                    echo "
                    <div class='container'>
                        <div class='row justify-content-start my_alert3'>
                            <div class='col-8'>
                                <p class='pt-1'>
                                    Great news! You are an active developer now. 
                                </p>
                            </div>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
  displayFooter();
?>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/catalog.js"></script>
<script type="text/javascript" src="../assets/js/loader.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>