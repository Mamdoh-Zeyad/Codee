<?php
    include("../../includes/mysql_inti.php");

    // Get user info from the form
    $userId = $_POST['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
       
        $check_query_username = "SELECT * FROM users WHERE username = '$username' AND id != $userId";
        $check_query_email = "SELECT * FROM users WHERE email = '$email' AND id != $userId";
        $result_username = $conn->query($check_query_username);
        $result_email = $conn->query($check_query_email);

        if ($result_username->num_rows > 0) {
            ?>
                <script type="text/javascript"> 
                    alert('Username already exists!'); 
                    window.location = "../../views/admin.php";
                </script> 
            <?php
        } else if ($result_email->num_rows > 0) {
            ?>
                <script type="text/javascript"> 
                    alert('Email already exists!'); 
                    window.location = "../../views/admin.php";
                </script> 
            <?php
        } else {
            $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', birthdate = '$birthdate',
            email = '$email', phone_number = '$phone_number', username = '$username' WHERE id = $userId";
            $result = mysqli_query($conn, $sql);

            if ($conn->query($sql) === TRUE) {
                ?>
                    <script type="text/javascript"> 
                        alert('User information edited successfully.'); 
                        window.location = "../../views/admin.php";
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