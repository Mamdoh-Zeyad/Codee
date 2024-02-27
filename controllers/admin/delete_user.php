<?php
    /* 
        - This file for delete a user.
    */
    if (isset($_GET['id'])) {
        
        include("../../includes/mysql_inti.php");

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $deleteSkillsQuery = "DELETE FROM development_skills WHERE user_id = '$id'";
        mysqli_query($conn, $deleteSkillsQuery);

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