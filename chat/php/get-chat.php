<?php 
    session_start();
    if(isset($_SESSION['username'])){
        include_once "../../includes/mysql_inti.php";
        $outgoing_username = $_SESSION['username'];
        $incoming_username = mysqli_real_escape_string($conn, $_POST['incoming_username']);
        $output = "";
        // Ensure proper quoting of string values and use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.username = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = ? AND incoming_msg_id = ?)
                OR (outgoing_msg_id = ? AND incoming_msg_id = ?) ORDER BY msg_id";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $outgoing_username, $incoming_username, $incoming_username, $outgoing_username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    if($row['outgoing_msg_id'] === $outgoing_username){
                        $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                    </div>';
                    }else{
                        $output .= '<div class="chat incoming">
                                    <img src="php/images/'.$row['img'].'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                    </div>';
                    }
                }
            }else{
                $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
            }
            echo $output;
        } else {
            // Handle prepared statement error
            echo "SQL error: " . mysqli_error($conn);
        }
    }else{
        header("location: ../../views/login.php");
    }
?>
