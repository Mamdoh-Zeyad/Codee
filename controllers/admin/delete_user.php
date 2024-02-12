<?php
    if (isset($_GET['id'])) {
        
        include("../../includes/mysql_inti.php");

        // Sanitize the input to prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $deleteQuery = "DELETE FROM users WHERE id = '$id'";
        mysqli_query($conn, $deleteQuery);

        mysqli_close($conn);

        ?>
        <script type="text/javascript"> 
            alert('User Deleted Successfully.'); 
            window.location = "../../views/admin.php";
        </script> 
        <?php
    } else {
        echo "Error: Invalid request.";
    }
?>