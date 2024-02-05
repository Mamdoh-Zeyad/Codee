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
                    <a class="nav-link my_nav" id="active_link" aria-current="page" href="admin_users.php"><i class="fa-solid fa-users logout_icon"></i></i> Users Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my_nav" href="admin_support.php"><i class="fa-solid fa-headset logout_icon"></i> Support Dashboard</a>
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
                    <p class="my_header_font">Users Dashboard.</p>
                    <p class="light_font">This table display all user’s information.</p>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Bairthdate</th>
                                    <th scope="col">Nationlity</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include("../includes/mysql_inti.php");

                                    function displayRoleBadge($role)
                                    {
                                        if ($role === "User")
                                            return 'badge bg-primary';
                                        else if ($role === "Developer")
                                            return 'badge bg-secondary';
                                        else if ($role === "Consultant")
                                            return 'badge bg-dark';
                                        else if ($role === "Admin")
                                            return 'badge bg-info';
                                        else
                                            return 'badge bg-info';
                                    }

                                    function displayStatusBadge($status)
                                    {
                                        if ($status === "Active")
                                            return 'badge bg-success';
                                        else if ($status === "Inactive")
                                            return 'badge bg-danger';
                                        else if ($status === "pending")
                                            return 'badge bg-warning';
                                        else
                                            return 'badge bg-info';
                                    }

                                    function displayRow($rowId, $id, $first_name, $last_name, $bairthdate, 
                                    $nationlity, $email, $phone_Number, $username, $role, $status){
                                        echo '<tr data-row-id="' . $rowId . '">';
                                        echo '<td class="text-left">' . $id . '</td>';
                                        echo '<td class="text-left">' . $first_name . '</td>';
                                        echo '<td class="text-left">' . $last_name . '</td>';
                                        echo '<td class="text-left">' . $bairthdate . '</td>';
                                        echo '<td class="text-left">' . $nationlity . '</td>';
                                        echo '<td class="text-left">' . $email . '</td>';
                                        echo '<td class="text-left">' . $phone_Number . '</td>';
                                        echo '<td class="text-left">' . $username . '</td>';
                                        echo '<td class="text-left"><span class="' . displayRoleBadge($role) . '">' . $role . ' </td>';
                                        echo '<td class="text-left"><span class="' . displayStatusBadge($status) . '">' . $status . '</td>';
                                        echo ' <td>';
                                        echo '<a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Edit" href="javascript:void()" class="mr-4 pe-3 edit_icon" data-toggle="tooltip" data-placement="top"
                                            data-original-title="Edit" data-id="' . $id . '"><i class="fa-solid fa-pen-to-square"></i></a>';
                                        echo '<a title="Delete" href="javascript:void()" class="delete_icon" data-toggle="tooltip" data-placement="top"
                                             data-original-title="Delete" data-id="' . $id . '"><i class="fa-solid fa-user-xmark"></i></a></span>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }

                                    // Define the number of rows to display per page
                                    $rowsPerPage = 20;

                                    // Calculate the offset based on the current page
                                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                                    $offset = ($page - 1) * $rowsPerPage;

                                    // SQL query to include LIMIT and OFFSET
                                    $sql = "SELECT * FROM users LIMIT $offset, $rowsPerPage";
                                    $result = mysqli_query($conn, $sql);

                                    // Initialize a counter
                                    $counter = 0;

                                    // Loop through the results
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        displayRow($counter, $row["id"], $row["first_name"], $row["last_name"], $row["birthdate"], 
                                        $row["nationality"], $row["email"], $row["phone_number"], $row["username"], $row["role"], $row["status"]);
                                        
                                        $counter++;
                                    }
                                    
                                    // Calculate the total of records
                                    $totalRowsQuery = "SELECT COUNT(*) AS total FROM users";
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

<!-- Edit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User's Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registrationForm" class="row g-3 needs-validation" method="post" action="../controllers/admin/edit_user.php" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">User ID</label>
                        <input type="text" class="form-control" name="id" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First Name<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="" pattern="[a-zA-Z]+" name="first_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last Name<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="" pattern="[a-zA-Z]+" name="last_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Birthdate<span class="red_star">*</span></label>
                        <input type="date" class="form-control" id="validationCustom02" name="birthdate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Email<span class="red_star">*</span></label>
                        <input type="email" class="form-control" id="validationCustom01" placeholder="example@domain.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" name="email" id="email" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Phone Number<span class="red_star">*</span></label>
                        <input type="text" class="form-control" id="validationCustom02" name="phone_number" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustomUsername" class="form-label">Username<span class="red_star">*</span></label>
                        <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" placeholder="" pattern="^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$" name="username" id="username" required>
                        <div class="invalid-feedback" id="usernameError">
                            Please choose a username that contains letters or numbers or underscore (_) or dot (.)
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer col-12">
                        <button type="submit" class="my_btn1 float-end">Edit</button>
                        <button type="button" class="my_btn2" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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