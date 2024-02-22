<?php
    while($row = mysqli_fetch_assoc($query)){
        // Properly quote string values in the SQL query
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = '{$row['username']}'
                OR outgoing_msg_id = '{$row['username']}') AND (outgoing_msg_id = '{$outgoing_username}' 
                OR incoming_msg_id = '{$outgoing_username}') ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        // Check if $query2 is a valid result set
        if ($query2) {
            $row2 = mysqli_fetch_assoc($query2);
            $result = (mysqli_num_rows($query2) > 0) ? $row2['msg'] : "No message available";
        } else {
            // Handle the case when $query2 is not a valid result set
            $result = "Error retrieving message";
        }
        $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;
        if(isset($row2['outgoing_msg_id'])){
            $you = ($outgoing_username == $row2['outgoing_msg_id']) ? "You: " : "";
        } else {
            $you = "";
        }
        $offline = ($row['chat_status'] == "Offline now") ? "offline" : "";
        $hid_me = ($outgoing_username == $row['username']) ? "hide" : "";

        $output .= '<a href="chat.php?username='. $row['username'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['username'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>