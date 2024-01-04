<?php
    include("../includes/mysql_inti.php");

    // Take values from the form
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $birthdate = sanitize($_POST['birthdate']);
    $nationality = sanitize($_POST['nationality']);
    $email = sanitize($_POST['email']);
    $phone_number = sanitize($_POST['phone_number']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $role = sanitize($_POST['role']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    function sanitize($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if (isset($_POST['username'])) {
        $check_query_username = "SELECT * FROM users WHERE username = '$username'";
        $check_query_email = "SELECT * FROM users WHERE email = '$email'";
        $result_username = $conn->query($check_query_username);
        $result_email = $conn->query($check_query_email);

        if ($result_username->num_rows > 0) {
            echo "Username already exists";
        } else if ($result_email->num_rows > 0) {
            echo "Email already exists";
        } else {
            // Insert data into the DB
            $sql = "INSERT INTO users (first_name, last_name, birthdate, nationality, email, phone_number, username, password, role, status) VALUES 
            ('$first_name', '$last_name', '$birthdate', '$nationality', '$email', '$phone_number', '$username', '$hashed_password', '$role', 'Inactive')";

            // Check if the data inserted or not
            if ($conn->query($sql) === TRUE) {
                echo "Success"; // Send success response
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close Connection
            $conn->close();
        }
    }
?>