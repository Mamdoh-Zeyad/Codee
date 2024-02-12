<?php
    /*
        - This file includes functions for multiple uses.
    */

    //Functions to display the dropdown menu in the navbar
    function displayAdminDropdownMenu($str){
        echo "<div class='dropdown dropdown-toggle text-center' aria-expanded='false'>";
        echo "<span>Welcome, ";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if($_SESSION['role'] != $str){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>
            <ul class='dropdown-menu dropdown-content'>
                <li><a class='dropdown-item' href='www.google.com'>Link</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='../controllers/logout_controller.php'>
                <i class='fa-solid fa-right-from-bracket'></i> Logout</a> </li>
            </ul>
        </div>";
    }
    function displayOtherDropdownMenu($str){
        echo "<div class='dropdown dropdown-toggle text-center' aria-expanded='false'>";
        echo "<span>Welcome, ";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if($_SESSION['role'] === $str){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>
            <ul class='dropdown-menu dropdown-content'>
                <li><a class='dropdown-item' href='www.google.com'>Link</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='../controllers/logout_controller.php'>
                <i class='fa-solid fa-right-from-bracket'></i> Logout</a> </li>
            </ul>
        </div>";
    }
    function displayDevDropdownMenu($str){
        echo "<div class='dropdown dropdown-toggle text-center' aria-expanded='false'>";
        echo "<span>Welcome, ";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if($_SESSION['role'] != $str){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>
            <ul class='dropdown-menu dropdown-content'>
                <li><a class='dropdown-item' href='www.google.com'>Link</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='../controllers/logout_controller.php'>
                <i class='fa-solid fa-right-from-bracket'></i> Logout</a> </li>
            </ul>
        </div>";
    }
    function displayDevConDropdownMenu($dev, $cons){
        echo "<div class='dropdown dropdown-toggle text-center' aria-expanded='false'>";
        echo "<span>Welcome, ";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if($_SESSION['role'] != $dev && $_SESSION['role'] != $cons){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>
            <ul class='dropdown-menu dropdown-content'>
                <li><a class='dropdown-item' href='www.google.com'>Link</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='../controllers/logout_controller.php'>
                <i class='fa-solid fa-right-from-bracket'></i> Logout</a> </li>
            </ul>
        </div>";
    }

    /* ------------------------------------------------------Break Line------------------------------------------------------ */

    //This function to display the footer. 
    function displayFooter(){
        echo "<div class='home_footer mt-3 card_shadow'>
            <p>&copy; 2024 Codee - All Rights Reserved</p>
        </div>";
    }


?>