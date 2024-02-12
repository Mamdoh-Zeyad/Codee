<!--Request Header-->
<title>Codee - Catalog</title>
<?php
    require_once('../includes/partials/header.php');
    include("../includes/functions.php");
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
?>

<!--Home Page Header-->
<nav class="navbar navbar-expand-lg my_navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link my_nav" id="active_link" aria-current="page" href="catalog.php"><i class="fa-solid fa-users-viewfinder logout_icon"></i> Catalogue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my_nav" href="#"><i class="fa-solid fa-comment logout_icon"></i> Chatting</a>
                </li>
                <?php
                    if($_SESSION['role'] === 'Developer'){
                        echo "<li class='nav-item'>
                                <a class='nav-link my_nav' href='development_area.php'><i class='fa-solid fa-code logout_icon'></i> Developement Area</a>
                            </li>";
                    }
                ?>
            </ul>
            <?php
                displayOtherDropdownMenu('Admin');
            ?>
            
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