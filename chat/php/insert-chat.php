<?php 
    session_start();
    if(isset($_SESSION['username'])){
        include_once "../../includes/mysql_inti.php";
        $outgoing_username = $_SESSION['username'];
        $incoming_username = mysqli_real_escape_string($conn, $_POST['incoming_username']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES 
            ('$incoming_username', '$outgoing_username', '$message')";
            if ($conn->query($sql) === TRUE) {
                echo "All good!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }else{
        header("location: ../login.php");
    }
?>