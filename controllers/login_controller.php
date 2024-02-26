<?php
    /*
        - This file to handle the login.php form
    */
    session_start();

    // connect to the database
    include("../includes/mysql_inti.php");

    // check if the username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // this function will validate the username and password by removing any spaces
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        // check if the username and password are empty or not
        if (empty($username)) {
            header("Location: ../views/login.php?error=Username is required.");
            exit();
        } elseif (empty($password)) {
            header("Location: ../views/login.php?error=Password is required.");
            exit();
        }

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        // Check if the query returned a row (successful login)
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            // dehash the password and check if its same or not
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['birthdate'] = $row['birthdate'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone_number'] = $row['phone_number'];
                $_SESSION['nationality'] = $row['nationality'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['img'] = $row['img'];
                $_SESSION['chat_status'] = $row['chat_status'];
                
                // redirect the user depending on his role
                if ($_SESSION['role'] === "Developer" || $_SESSION['role'] === "Consultant" || $_SESSION['role'] === "User") {
                    $chat_status = "Active now";
                    $sql2 = "UPDATE users SET chat_status = 'Active now' WHERE username = '" . mysqli_real_escape_string($conn, $username) . "'";
                    mysqli_query($conn, $sql2);
                    header("Location: ../views/catalog.php");
                    exit(); 
                }else{
                    $chat_status = "Active now";
                    $sql2 = "UPDATE users SET chat_status = 'Active now' WHERE username = '" . mysqli_real_escape_string($conn, $username) . "'";
                    mysqli_query($conn, $sql2);
                    header("Location: ../views/admin.php");
                    exit();
                }
            } else {
                header("Location: ../views/login.php?error=Incorrect username or password.");
                exit();
            }
        } else {
            header("Location: ../views/login.php?error=Incorrect username or password.");
            exit();
        }
    }
?>