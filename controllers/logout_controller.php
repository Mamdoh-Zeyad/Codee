<?php
    // session_start();
    // include("../includes/mysql_inti.php");
    // if(isset($_SESSION['username'])){
    //     $logout_username = mysqli_real_escape_string($conn, $_GET['logout_username']);
    //     if(isset($logout_username)){
    //         $chat_status = "Offline now";
    //         $sql = "UPDATE users SET chat_status = '{$chat_status}' WHERE username={$_GET['logout_username']}";
    //         mysqli_query($conn, $sql);
    //         if($sql){
    //             session_unset();
    //             session_destroy();
    //             header("location: ../views/login.php");
    //         }
    //     }
    // }else{  
    //     header("location: ../views/login.php");
    // }

    session_start();
    include("../includes/mysql_inti.php");

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Check if the user is logged in
    if(isset($_SESSION['username'])){
        // Check if logout_username is set in the URL
        if(isset($_GET['logout_username'])){
            // Sanitize the logout_username to prevent SQL injection
            $logout_username = mysqli_real_escape_string($conn, $_GET['logout_username']);
            // Update the chat_status to "Offline now"
            $chat_status = "Offline now";
            // Generate the SQL query
            $sql = "UPDATE users SET chat_status = '$chat_status' WHERE username='$logout_username'";
            echo "SQL query: $sql"; // Debugging: Echo the SQL query
            // Execute the query
            if(mysqli_query($conn, $sql)){
                // If the update was successful, unset and destroy the session
                session_unset();
                session_destroy();
                // Redirect to the login page
                header("location: ../views/login.php");
                exit(); // Exit the script
            } else {
                // If the update failed, display the error
                echo "Error updating chat status: " . mysqli_error($conn); // Debugging: Display SQL error
                exit(); // Exit the script
            }
        }
    } else {  
        // If the user is not logged in, redirect to the login page
        header("location: ../views/login.php");
        exit(); // Exit the script
    }
?>
