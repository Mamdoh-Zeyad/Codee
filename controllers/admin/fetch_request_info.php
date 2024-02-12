<?php
    include("../../includes/mysql_inti.php");

    if (isset($_POST['id'])) {
        $userId = $_POST['id'];

        // Fetch user info from the database
        $sql = "SELECT * FROM development_skills WHERE user_id = $userId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $userInfo = mysqli_fetch_assoc($result);
            echo json_encode($userInfo);
        } else {
            echo json_encode(['error' => 'Unable to fetch user info']);
        }
    } else {
        echo json_encode(['error' => 'Invalid request']);
    }
    mysqli_close($conn);
?>