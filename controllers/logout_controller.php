<?php
    /*
        - This file to handle the logout
    */

    // start the session
    session_start();
    // connect to the database
    include("../includes/mysql_inti.php");

    // displaying any error in the database
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(isset($_SESSION['username'])){
        if(isset($_GET['logout_username'])){
            // chanage the user chat_status to the Offline now
            $logout_username = mysqli_real_escape_string($conn, $_GET['logout_username']);
            $chat_status = "Offline now";
            $sql = "UPDATE users SET chat_status = '$chat_status' WHERE username='$logout_username'";
            echo "SQL query: $sql";
            if(mysqli_query($conn, $sql)){
                // destroy the session
                session_unset();
                session_destroy();
                header("location: ../views/login.php");
                exit();
            } else {
                echo "Error updating chat status: " . mysqli_error($conn);
                exit(); 
            }
        }
    } else {  
        header("location: ../views/login.php");
        exit();
    }
?>
