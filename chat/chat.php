<title>Codee - Users</title>
<?php
    require_once('../includes/partials/header.php');
    include("../includes/functions.php");
    include("../includes/mysql_inti.php");
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && 
    isset($_SESSION['last_name']) && isset($_SESSION['chat_status'])) {
?>

<div class="wrapper">
  <section class="chat-area">
    <header>
      <?php 
        // Properly quote the username string value in the SQL query
        $username = mysqli_real_escape_string($conn, $_GET['username']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
        if($sql && mysqli_num_rows($sql) > 0){
          $row = mysqli_fetch_assoc($sql);
        }else{
          header("location: users.php");
          exit(); // Exit the script
        }
      ?>
      <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
      <img src="php/images/<?php echo $row['img']; ?>" alt="">
      <div class="details">
        <span><?php echo $row['username']?></span>
        <p><?php echo $row['chat_status']; ?></p>
      </div>
    </header>
    <div class="chat-box">
    </div>
    <form action="#" class="typing-area">
      <input type="text" class="incoming_id" name="incoming_username" value="<?php echo $username; ?>" hidden>
      <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
      <button><i class="fab fa-telegram-plane"></i></button>
    </form>
  </section>
</div>

<script src="javascript/chat.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: ../views/login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>
