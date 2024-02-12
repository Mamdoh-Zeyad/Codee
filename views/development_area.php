<!--Request Header-->
<title>Codee - Development Area</title>
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
                <a class="nav-link my_nav" aria-current="page" href="catalog.php"><i class="fa-solid fa-users-viewfinder logout_icon"></i> Catalogue</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" href="#"><i class="fa-solid fa-comment logout_icon"></i> Chatting</a>
                </li>
                <li class="nav-item">
                <a class="nav-link my_nav" id="active_link" href="development_area.php"><i class="fa-solid fa-code logout_icon"></i> Developement Area</a>
                </li>
            </ul>
            <?php
                displayDevDropdownMenu('Developer');
            ?>
        </div>
    </div>
</nav>

<!-- content -->
<div class="container">
    <div class="IDEheader mt-4 card_shadow"> Codeboard Online IDE </div>
    <div class="language-container card_shadow">
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
    <div class="editor card_shadow" id="editor"></div>
    <div class="labelOutput card_shadow"> Output </div>
    <div class="output mb-4 card_shadow"></div>
    </div>  
    <!-- chatbot -->
    <button class="chatbot-toggler card_shadow">
    <span class="material-icons"><i class="fa-brands fa-rocketchat"></i></span>
    <span class="material-icons">close</span>
    </button>
    <div class="chatbot">
    <header>
        <h2>ChatGPT 3.5</h2>
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

<!-- Footer -->
<?php
  displayFooter();
?>

<!-- Scripts File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assets/js/development_area/lib/ace.js"></script>
<script src="../assets/js/development_area/lib/theme-monokai.js"></script>
<script src="../assets/js/development_area/ide.js"></script>
<script src="../assets/js/loader.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>
