<!--Request Header-->
<title>Codee - Admin</title>
<?php
    require_once('../includes/partials/header.php');
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
                    <a class="nav-link my_nav" aria-current="page" href="admin_users.php"><i class="fa-solid fa-users logout_icon"></i></i> Users Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my_nav" href="admin_support.php"><i class="fa-solid fa-headset logout_icon"></i> Support Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my_nav" id="active_link" href="admin_requests.php"><i class="fa-solid fa-hand-point-up logout_icon"></i> Verification Requests Dashboard</a>
                </li>
            </ul>
            <div class="text-center">
                <span>
                    Hello, <?php 
                            echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
                            if($_SESSION['role'] != 'Admin'){
                            header("Location: ../views/access_denied.php"); 
                            exit();} 
                            ?>
                | </span> <a title="Logout" href="../controllers/logout_controller.php"><i class="fa-solid fa-right-from-bracket logout_icon"></i> </a> 
            </div>
        </div>
    </div>
</nav>

<!--Start Home Page Footer-->
<div class="home_footer">
    <p>&copy; 2024 Codee - All Rights Reserved</p>
</div>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>