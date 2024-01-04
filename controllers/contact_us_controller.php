<?php
    include("../includes/mysql_inti.php");

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $phone_number = $_POST['phone_number'];
    $code_phone_number = $country_code . $phone_number;
    $comments = $_POST['comments'];

    $sql = "INSERT INTO contact_us (full_name, email, phone_number, comments) VALUES 
    ('$full_name', '$email', '$code_phone_number', '$comments')";

    if ($conn->query($sql) === TRUE) {
        ?>
            <script type="text/javascript"> 
            alert('Message Sent Successfully.'); 
            window.location = "../views/home.php";
            </script> 
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //Close Connection 
    $conn->close();
?>