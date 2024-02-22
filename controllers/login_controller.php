<?php
    session_start();

    include("../includes/mysql_inti.php");

    if (isset($_POST['username']) && isset($_POST['password'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

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
                $_SESSION['chat_status'] = $row['chat_status'];
                
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
                // Add other role checks as needed
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