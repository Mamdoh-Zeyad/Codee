<?php
    session_start();
    include_once "../../includes/mysql_inti.php";
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $outgoing_username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE NOT username = ? ORDER BY id DESC";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $outgoing_username);
    
    mysqli_stmt_execute($stmt);
    
    $query = mysqli_stmt_get_result($stmt);
    
    $output = "";
    
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    } elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    
    echo $output;
?>
