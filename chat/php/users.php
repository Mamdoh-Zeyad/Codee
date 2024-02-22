<?php
    session_start();
    include_once "../../includes/mysql_inti.php";
    
    // Check database connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $outgoing_username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE NOT username = ? ORDER BY id DESC";
    
    // Prepare and bind the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $outgoing_username);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get result set
    $query = mysqli_stmt_get_result($stmt);
    
    $output = "";
    
    // Check if there are rows in the result set
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    } elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    
    echo $output;
?>
