<?php
    /* 
        - This file for approve a user.
    */
    include("../../includes/mysql_inti.php");

    $userId = $_POST['user_id'];

    // Fetch user info from the database
    $sql = "UPDATE users set status = 'Active' WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if ($conn->query($sql) === TRUE) {
        ?>
            <script type="text/javascript"> 
            alert('The user activated successfully. You are redirected to the admin dashboard.'); 
            window.location = "../../views/admin.php";
            </script> 
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
?>