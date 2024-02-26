<?php
    /*
        - This file to handle the logout
    */

    // connect to the database
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

    // check if the username is set
    if (isset($_POST['username'])) {
        $check_query_username = "SELECT * FROM users WHERE username = '$username'";
        $check_query_email = "SELECT * FROM users WHERE email = '$email'";
        $result_username = $conn->query($check_query_username);
        $result_email = $conn->query($check_query_email);

        // checking if the username or email are duplicated or not
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
            // save the image to the iamges file
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
                    
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            //check the image extensions
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"../chat/php/images/".$new_img_name)){
                                
                        // Insert data into the DB
                        $sql = "INSERT INTO users (first_name, last_name, birthdate, nationality, email, phone_number, username, password, role, status, img) VALUES 
                        ('$first_name', '$last_name', '$birthdate', '$nationality', '$email', '$phone_number', '$username', '$hashed_password', '$role', 'Inactive', '$new_img_name')";

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
            }
        }
    }
?>