<!--Request Header-->
<title>Codee - Catalog</title>
<?php
    require_once('../includes/partials/header.php');
    include("../includes/functions.php");
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
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
                    <a class="nav-link active" aria-current="page" href="#"><img class="profile_img" src="../chat/php/images/<?php echo $_SESSION['img']; ?>" alt=""></a>
                    <?php
                    displayOtherDropdownMenu('Admin');
                    ?>
                </div>
                <div class="my_nav">
                    <a class="nav-link active" aria-current="page" href="catalog.php"><i class="fa-solid fa-users-viewfinder fa-2x"></i></a>
                    <a class="nav-link active" aria-current="page" href="catalog.php">Catalog</a>
                </div>
                <div class="my_nav">
                    <a class="nav-link active" aria-current="page" href="../chat/users.php"><i class="fa-solid fa-comment fa-2x"></i></a>
                    <a class="nav-link active" aria-current="page" href="../chat/users.php">Chatting</a>
                </div>
                <?php
                if ($_SESSION['role'] === 'Developer') {
                    echo "<div class='my_nav'>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'><i class='fa-solid fa-code fa-2x'></i></a>";
                    echo "<a class='nav-link active' aria-current='page' href='development_area.php'>Development Area</a></div>";
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

<!-- catalog content -->
<div class="catalog_content">
    <div class="container mt-4">
        <div class="form_header card p-3 mt-4 mb-4 card_shadow">
            <p class="my_header_font">Developers & Consultants Catalog.</p>
            <p class="light_font">Use the services of the best programmers around the world.</p>
            <?php
            if (($_SESSION['role'] === 'Developer' || $_SESSION['role'] === 'Consultant') &&
                $_SESSION['status'] === "Inactive"
            ) {
                echo "
                <div class='container'>
                    <div class='row justify-content-start my_alert'>
                        <div class='col-8'>
                            <p class='pt-1'>
                                To join as a developer in our community you must verify your account to appear in the catalog.
                            </p>
                        </div>
                        <div class='col-4'>
                            <button class='my_btn1 float-end' type='submit'><a href='verifiction.php'>Verify Account</a></button> 
                        </div>
                    </div>
                </div>";
            } else if (($_SESSION['role'] === 'Developer' || $_SESSION['role'] === 'Consultant')
                && $_SESSION['status'] === "Pending"
            ) {
                echo "
                <div class='container'>
                    <div class='row justify-content-start my_alert2'>
                        <div class='col-8'>
                            <p class='pt-1'>
                                Thank you for submitting the form, just be patient we are verifying your account!
                            </p>
                        </div>
                    </div>
                </div>";
            } else if (($_SESSION['role'] === 'Developer' || $_SESSION['role'] === 'Consultant')
                && $_SESSION['status'] === "Active"
            ) {
                echo "
                <div class='container'>
                    <div class='row justify-content-start my_alert3'>
                        <div class='col-8'>
                            <p class='pt-1'>
                                Great news! You are an active developer now. 
                            </p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        include("../includes/mysql_inti.php");

        $rowsPerPage = 6;

        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $rowsPerPage;

        $sql = "SELECT users.first_name, users.last_name, users.img, users.username, users.role, development_skills.development_category, development_skills.preferd_programming_language
                FROM users
                INNER JOIN development_skills ON users.id = development_skills.user_id
                WHERE users.status = 'Active' AND users.username != '{$_SESSION['username']}'
                LIMIT $offset, $rowsPerPage";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error executing query: " . mysqli_error($conn);
            exit;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-4 mb-4 ">';
            echo '<div class="card card_shadow animate__animated animate__fadeInUp">';
            echo '<div class="card_header card_shadow"><img class="header_img card_shadow" src="../chat/php/images/' . $row['img'] . '" alt=""></div>';
            echo '<div class="card-body text-center">';
            echo '<h2 class="card-title pt-5 header_caption_blueFont">' . $row['first_name'] . ' ' . $row['last_name'] . '(' . $row['username'] . ')' . '</h2>';
            echo '<p class="card-text">' . '<span class="red_star">' . $row['role'] . '</span>'. ' | ' . $row['development_category'] . ' | ' . $row['preferd_programming_language'] . '</p>';
            echo '<div class="d-flex align-items-center justify-content-end">';
            echo '<a href="../chat/chat.php?username=' . $row['username'] . '"class="chat_link">Direct Chat <i class="fa-solid fa-comment my_IconeColor2"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $countSql = "SELECT COUNT(*) as total FROM users WHERE status = 'Active'";
        $countResult = mysqli_query($conn, $countSql);
        $countRow = mysqli_fetch_assoc($countResult);
        $totalRows = $countRow['total'];

        mysqli_close($conn);
        ?>
    </div>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php
                    $totalPages = ceil($totalRows / $rowsPerPage);

                    echo '<li class="page-item">';
                    echo '<a class="page-link" href="?page=1" aria-label="First">';
                    echo '<span aria-hidden="true">&laquo;&laquo;</span>';
                    echo '</a>';
                    echo '</li>';

                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">';
                        echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                        echo '</li>';
                    }

                    echo '<li class="page-item">';
                    echo '<a class="page-link" href="?page=' . $totalPages . '" aria-label="Last">';
                    echo '<span aria-hidden="true">&raquo;&raquo;</span>';
                    echo '</a>';
                    echo '</li>';
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
displayFooter();
?>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/catalog.js"></script>

<!--Request Footer-->
<?php
    } else {
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>