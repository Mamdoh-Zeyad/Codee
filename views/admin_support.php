<!--Request Header-->
<title>Codee - Admin</title>
<?php
    require_once('../includes/partials/header.php');
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
?>

<!--Home Page Header-->
<nav class="navbar navbar-expand-lg my_navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php"><img class="my_logo" src="../assets/img/codee-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link my_nav" aria-current="page" href="admin_users.php"><i class="fa-solid fa-users logout_icon"></i></i> Users Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my_nav" id="active_link" href="admin_support.php"><i class="fa-solid fa-headset logout_icon"></i> Support Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my_nav" href="admin_requests.php"><i class="fa-solid fa-hand-point-up logout_icon"></i> Verification Requests Dashboard</a>
                </li>
            </ul>
            <div class="text-center">
                <span>
                    Hello, <?php 
                            echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; 
                            if($_SESSION['role'] != 'Admin'){
                            header("Location: ../views/access_denied.php"); 
                            exit();} 
                            ?>
                | </span> <a title="Logout" href="../controllers/logout_controller.php"><i class="fa-solid fa-right-from-bracket logout_icon"></i> </a> 
            </div>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="content-body mt-5 mb-5">
    <div class="container">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <p class="my_header_font">Support Dashboard.</p>
                    <p class="light_font">This table displays all contact us messages.</p>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include("../includes/mysql_inti.php");

                                    function displayRow($rowId, $id, $full_name, $email, $phone_Number, $comments){
                                        echo '<tr data-row-id="' . $rowId . '">';
                                        echo '<td class="text-left">' . $id . '</td>';
                                        echo '<td class="text-left">' . $full_name . '</td>';
                                        echo '<td class="text-left">' . $email . '</td>';
                                        echo '<td class="text-left">' . $phone_Number . '</td>';
                                        echo '<td class="text-left">' . $comments . '</td>';
                                        echo ' <td>';
                                        echo '<span><a title="Reply" href="mailto:' . $email . '" class="mr-4 edit_icon" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Reply" data-id="' . $id . '"><i class="fa-solid fa-reply"></i></a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }

                                    // Define the number of rows to display per page
                                    $rowsPerPage = 20;

                                    // Calculate the offset based on the current page
                                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                                    $offset = ($page - 1) * $rowsPerPage;

                                    // SQL query to include LIMIT and OFFSET
                                    $sql = "SELECT * FROM contact_us LIMIT $offset, $rowsPerPage";
                                    $result = mysqli_query($conn, $sql);

                                    // Initialize a counter
                                    $counter = 0;

                                    // Loop through the results
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        displayRow($counter, $row["id"], $row["full_name"], $row["email"], $row["phone_number"], $row["comments"]);
                                        
                                        $counter++;
                                    }
                                    
                                    // Calculate the total of records
                                    $totalRowsQuery = "SELECT COUNT(*) AS total FROM contact_us";
                                    $totalResult = mysqli_query($conn, $totalRowsQuery);
                                    $totalRows = mysqli_fetch_assoc($totalResult)['total'];

                                    // Close the database connection
                                    mysqli_close($conn);

                                    // Close the table
                                    echo '</tbody>';
                                    echo '</table>';

                                    // Display pagination links
                                    echo '<div class="pagination d-flex justify-content-end">';
                                    echo '<ul class="pagination">';

                                    // Previous Page Link
                                    echo '<li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '">';
                                    echo '<a class="page-link" href="?page=' . ($page - 1) . '" aria-label="Previous">';
                                    echo '<span aria-hidden="true">&laquo;</span>';
                                    echo '</a>';
                                    echo '</li>';

                                    // Display Page links
                                    for ($i = max(1, $page - 2); $i <= min($page + 2, ceil($totalRows / $rowsPerPage)); $i++) {
                                        echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                                        echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                                        echo '</li>';
                                    }

                                    // Next Page Link
                                    echo '<li class="page-item ' . ($page >= ceil($totalRows / $rowsPerPage) ? 'disabled' : '') . '">';
                                    echo '<a class="page-link" href="?page=' . ($page + 1) . '" aria-label="Next">';
                                    echo '<span aria-hidden="true">&raquo;</span>';
                                    echo '</a>';
                                    echo '</li>';

                                    echo '</ul>';
                                    echo '</div>';
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Start Home Page Footer-->
<div class="home_footer">
    <p>&copy; 2024 Codee - All Rights Reserved</p>
</div>

<!-- Scripts File -->
<script type="text/javascript" src="../assets/js/admin/admin_users.js"></script>

<!--Request Footer-->
<?php
    }
    else{
        header("Location: login.php");
        exit();
    }
    require_once('../includes/partials/footer.php');
?>