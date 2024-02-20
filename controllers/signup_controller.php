<?php
    include("../includes/mysql_inti.php");

    // Take values from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
    if (isset($_POST['username'])) {
        $check_query_username = "SELECT * FROM users WHERE username = '$username'";
        $check_query_email = "SELECT * FROM users WHERE email = '$email'";
        $result_username = $conn->query($check_query_username);
        $result_email = $conn->query($check_query_email);

        if ($result_username->num_rows > 0) {
            ?>
                <script type="text/javascript"> 
                    alert('Username already exists.'); 
                    window.location = "../views/signup.php";
                </script> 
            <?php
        } else if ($result_email->num_rows > 0) {
            ?>
                <script type="text/javascript"> 
                    alert('Email already exists.'); 
                    window.location = "../views/signup.php";
                </script> 
            <?php
        } else {
            // Insert data into the DB
            $sql = "INSERT INTO users (first_name, last_name, birthdate, nationality, email, phone_number, username, password, role, status) VALUES 
            ('$first_name', '$last_name', '$birthdate', '$nationality', '$email', '$phone_number', '$username', '$hashed_password', '$role', 'Inactive')";

            // Check if the data inserted or not
            if ($conn->query($sql) === TRUE) {
                ?>
                    <script type="text/javascript"> 
                        alert('Your information has been added successfully. You will now be redirected to the login page.'); 
                        window.location = "../views/login.php";
                    </script> 
                <?php
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close Connection
            $conn->close();
        }
    }
?>