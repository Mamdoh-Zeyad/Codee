<!--Request Header-->
<?php
    require_once('../includes/partials/header.php');
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
?>

<!--Home Page Header-->
<nav class="navbar navbar-expand-lg my_navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                <a class="nav-link my_nav" aria-current="page" href="#About">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#OurServices">Our Services</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#Workflow">Workflow</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#ContactUs">Contact Us</a>
                </li>
            </ul>
            <div class="text-center">
                <span>
                    Hello, <?php 
                            echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
                            if($_SESSION['role'] === 'Admin'){
                            header("Location: ../views/access_denied.html"); 
                            exit();} 
                            ?>
                | </span> <a title="Logout" href="../controllers/logout_controller.php"><i class="fa-solid fa-right-from-bracket logout_icon"></i> </a> 
            </div>
        </div>
    </div>
</nav>

<!--Start Home Page Footer-->
<div class="home_footer">
    <p>&copy; 2023 Codee - All Rights Reserved</p>
</div>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/catalog.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>