<!--Request Header-->
<title>Codee - Development Area</title>
<?php
    require_once('../includes/partials/header.php');
    include("../includes/functions.php");
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
?>

<!--Home Page Header-->
<nav class="navbar my_navbar">
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
                displayDevDropdownMenu('Developer');
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
