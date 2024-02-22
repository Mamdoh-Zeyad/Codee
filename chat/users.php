<title>Codee - Users</title>
<?php
    require_once('../includes/partials/header.php');
    include("../includes/functions.php");
    include("../includes/mysql_inti.php");
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && 
    isset($_SESSION['last_name']) && isset($_SESSION['chat_status'])) {
?>
<!--Home Page Header-->
<nav class="navbar my_navbar2">
    <div class="container">
        <a class="navbar-brand" href="home.php"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
        <button class="my_btn1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class=" text-center sidebar_body">
            <div class="my_nav">
            <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-user fa-2x"></i></a>
            <?php
                displayOtherDropdownMenu('Admin');
            ?>
            </div>
            <div class="my_nav">
            <a class="nav-link active" aria-current="page" href="catalog.php"><i class="fa-solid fa-users-viewfinder fa-2x"></i></a>
            <a class="nav-link active" aria-current="page" href="catalog.php">Catalog</a>
            </div>
            <div class="my_nav">
            <a class="nav-link active" aria-current="page" href="../ChatApp/users.php"><i class="fa-solid fa-comment fa-2x"></i></a>
            <a class="nav-link active" aria-current="page" href="../ChatApp/users.php">Chatting</a>
            </div>
            <?php
                if($_SESSION['role'] === 'Developer'){
                    echo "<div class='my_nav'>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'><i class='fa-solid fa-code fa-2x'></i></a>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'>Development Area</a></div>";
                }
            ?>
            <div class="my_nav">
            <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php?logout_username=<?php echo $_SESSION['username']; ?>"><i class="fa-solid fa-right-from-bracket fa-2x"></i></a>
            <a class="nav-link active" aria-current="page" href="../controllers/logout_controller.php?logout_username=<?php echo $_SESSION['username']; ?>">Logout</a>
            </div>
            <div class="my_nav_toggle">
            <label class="toggle">
                <input type="checkbox" id="modeToggle" onclick="toggleMode()">
                <span class="slider"></span>
            </label>
            </div>
        </div>
        </div>
    </div>
</nav>

<div class="wrapper">
  <section class="users">
    <header>
      <div class="content">
        <?php 
          // Execute SQL query
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_SESSION['username']}'");
          
          // Check for errors
          if($sql === false) {
              // Handle the error (display, log, etc.)
              echo "Error: " . mysqli_error($conn);
              // Stop execution or handle gracefully
              exit();
          }
          
          // Check if any rows were returned
          if(mysqli_num_rows($sql) > 0){
            // Fetch the row
            $row = mysqli_fetch_assoc($sql);
          }
        ?>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $_SESSION['username']?></span>
          <p><?php echo $_SESSION['chat_status']; ?></p>
        </div>
      </div>
    </header>
    <div class="search">
      <span class="text">Select an user to start chat</span>
      <input type="text" placeholder="Enter name to search...">
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="users-list">
    </div>
  </section>
</div>

<!-- Footer -->
<?php
  displayFooter();
?>

<script src="javascript/users.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: ../views/login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>
