<?php
    /* 
        - This file handle the approvement requests.
    */

    include("../includes/mysql_inti.php");

    // Take values from the form
    $Certification = $_POST['Certification'];
    $country_higher_degree = $_POST['country_higher_degree'];
    $Major = $_POST['Major'];
    $GPA = $_POST['GPA'];
    $programming_experience = $_POST['programming_experience'];
    $development_category = $_POST['development_category'];
    $preferd_programming_language = $_POST['preferd_programming_language'];
    $experience = $_POST['experience'];
    $file = $_POST['file'];
    $user_id = $_POST['user_id'];

    // Handle File Uploads
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $upload_directory = "../assets/uploads/";
    $destination = $upload_directory . $file_name;
    move_uploaded_file($file_tmp, $destination);

    // Save File URLs to Database
    $file_url = "http://localhost/codee/assets/uploads/" . $file_name;

    // Insert data into the DB
    $sqlInsert = "INSERT INTO development_skills (Certification, country_higher_degree, Major, GPA, programming_experience, 
    development_category, preferd_programming_language,experience, file, user_id) VALUES 
    ('$Certification', '$country_higher_degree', '$Major', '$GPA', '$programming_experience', 
    '$development_category', '$preferd_programming_language','$experience','$file_url', $user_id)";

    $sqlAlter = "UPDATE users SET status = 'Pending' WHERE id = $user_id";

    // Check if the data inserted or not
    if ($conn->query($sqlInsert) === TRUE && $conn->query($sqlAlter) === TRUE) {
        $response = "Success";
    } else {
        $response = "Error: " . $sqlInsert . "<br>" . $conn->error;
    }

    // Close Connection
    $conn->close();

    echo '<script>';
    echo 'var data = "' . $response . '";';
    echo 'if (data === "Success") {';
    echo '    alert("Your information has been added successfully. You will now be redirected to the catalog page.");';
    echo '    window.location = "../views/login.php";';
    echo '} else {';
    echo '    alert("Error: " + data);';
    echo '}';
    echo '</script>'; 
?>
