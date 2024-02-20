<?php
    /*
        - This file includes functions for multiple uses.
    */

    //Functions to display the dropdown menu in the navbar
    function displayAdminDropdownMenu($admin, $owner){
        echo "<span>";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if($_SESSION['role'] != $admin && $_SESSION['role'] != $owner){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>";
    }
    function displayOtherDropdownMenu($str){
        echo "<span>";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if($_SESSION['role'] === $str){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>";
    }
    function displayDevDropdownMenu($str){
        echo "<span>";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if($_SESSION['role'] != $str){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>";
    }
    function displayDevConDropdownMenu($dev, $cons){
        echo "<span>";
        echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
        if(($_SESSION['role'] != $dev && $_SESSION['status'] != 'Inactive') || 
        ($_SESSION['role'] != $cons && $_SESSION['status'] != 'Inactive')){
            header("Location: ../views/access_denied.php"); 
            exit();
        }
        echo "</span>";
    }

    /* ------------------------------------------------------Break Line------------------------------------------------------ */

    //This function to display the footer. 
    function displayFooter(){
        echo "<div class='home_footer'>
            <p>&copy; 2024 <span class='header_caption_blueFont'>CODEE</span> - All Rights Reserved</p>
        </div>";
    }


?>