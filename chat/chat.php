<title>Codee - Chat</title>
<?php
  require_once('../includes/partials/header.php');
  include("../includes/functions.php");
  include("../includes/mysql_inti.php");
  session_start();
  if (
    isset($_SESSION['username']) && isset($_SESSION['first_name']) &&
    isset($_SESSION['last_name']) && isset($_SESSION['chat_status'])
  ) {
?>
<!--Home Page Header-->
<nav class="navbar my_navbar2">
  <div class="container">
    <a class="navbar-brand" href="../views/home.php"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
    <button class="my_btn1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class=" text-center sidebar_body">
        <div class="my_nav">
          <a class="nav-link active" aria-current="page" href="#"><img class="profile_img" src="php/images/<?php echo $_SESSION['img']; ?>" alt=""></i></a>
          <?php
          displayOtherDropdownMenu('Admin');
          ?>
        </div>
        <div class="my_nav">
          <a class="nav-link active" aria-current="page" href="../views/catalog.php"><i class="fa-solid fa-users-viewfinder fa-2x"></i></a>
          <a class="nav-link active" aria-current="page" href="../views/catalog.php">Catalog</a>
        </div>
        <div class="my_nav">
          <a class="nav-link active" aria-current="page" href="users.php"><i class="fa-solid fa-comment fa-2x"></i></a>
          <a class="nav-link active" aria-current="page" href="users.php">Chatting</a>
        </div>
        <?php
        if ($_SESSION['role'] === 'Developer') {
          echo "<div class='my_nav'>";
          echo "<a class='nav-link active' aria-current='page' href='../views/development_area.php'><i class='fa-solid fa-code fa-2x'></i></a>";
          echo "<a class='nav-link active' aria-current='page' href='../views/development_area.php'>Development Area</a></div>";
        }
        ?>
        <div class="my_nav">
          <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php?logout_username=<?php echo $_SESSION['username']; ?>"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
          <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php?logout_username=<?php echo $_SESSION['username']; ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
</nav>
<div class="wrapper animate__animated animate__fadeInLeft">
  <section class="chat-area">
    <header>
      <?php
      // Properly quote the username string value in the SQL query
      $username = mysqli_real_escape_string($conn, $_GET['username']);
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
      if ($sql && mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
      } else {
        header("location: users.php");
        exit(); // Exit the script
      }
      ?>
      <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
      <img src="php/images/<?php echo $row['img']; ?>" alt="">
      <div class="details">
        <span><?php echo $row['username'] ?></span>
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

<!-- Footer -->
<?php
displayFooter();
?>

<script src="javascript/chat.js"></script>

<!--Request Footer-->
<?php
  } else {
    header("Location: ../views/login.php");
    exit();
  }
  require_once('../includes/partials/footer.php');
?>