<!--Request Header-->
<title>Codee - Development Area</title>
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
                <a class="nav-link my_nav" aria-current="page" href="catalog.php"><i class="fa-solid fa-users-viewfinder logout_icon"></i> Catalogue</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#"><i class="fa-solid fa-comment logout_icon"></i> Chatting</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" id="active_link" href="development_area.php"><i class="fa-solid fa-code logout_icon"></i> Developement Area</a>
                </li>
            </ul>
            <div class="text-center">
                <span>
                    Hello, <?php 
                            echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
                            if($_SESSION['role'] != 'Developer'){
                            header("Location: ../views/access_denied.php"); 
                            exit();} 
                            ?>
                | </span> <a title="Logout" href="../controllers/logout_controller.php"><i class="fa-solid fa-right-from-bracket logout_icon"></i> </a> 
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <div class="IDEheader mt-4"> Codeboard Online IDE </div>
    <div class="language-container">
        <label for="languages" class="language-label">Select Language:</label>
        <select id="languages" class="form-select smaller-select" aria-label=".form-select-sm example" onchange="changeLanguage()">
            <option value="php"> PHP </option>
            <option value="python"> Python </option>
            <option value="node"> Node JS </option>
            <option value="java"> Java </option>
            <option value="c"> C </option>
            <option value="cpp"> C++ </option>
        </select>
        <button class="btnIDE ms-auto" onclick="executeCode()"> Run </button>
    </div>

    <div class="editor mt-2" id="editor"></div>
    <div class="labelOutput mt-3"> Output </div>
    <div class="output mb-4 "></div>
    </div>  
    <!-- chatbot -->
    <button class="chatbot-toggler">
    <span class="material-icons">mode_comment</span>
    <span class="material-icons">close</span>
    </button>
    <div class="chatbot">
    <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-icons">close</span>
    </header>
    <ul class="chatbox">
        <li class="chat incoming">
            <span class="material-icons">smart_toy</span>
            <p>Hi there 👋<br>How i can help you today?</p>
        </li>
    </ul>
    <div class="chat-input">
        <textarea placeholder="Enter a message...." required></textarea>
        <span id="send-btn" class="material-icons">send</span>
    </div>
</div>


<!--Start Home Page Footer-->
<div class="home_footer">
    <p>&copy; 2024 Codee - All Rights Reserved</p>
</div>

<!-- Scripts File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assets/js/DeveloperPage/lib/ace.js"></script>
<script src="../assets/js/DeveloperPage/lib/theme-monokai.js"></script>
<script src="../assets/js/DeveloperPage/ide.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>
