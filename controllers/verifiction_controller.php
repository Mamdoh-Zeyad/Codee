<?php
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

            // Insert data into the DB
            $sql = "INSERT INTO development_skills (Certification, country_higher_degree, Major, GPA, programming_experience, development_category, preferd_programming_language,experience, file) VALUES 
            ('$Certification', '$country_higher_degree', '$Major', '$GPA', '$programming_experience', '$development_category', '$preferd_programming_language','$experience','$file')";

            // Check if the data inserted or not
            if ($conn->query($sql) === TRUE) {
                $response = "Success";
            } else {
                $response = "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close Connection
            $conn->close();

            echo '<script>';
            echo 'var data = "' . $response . '";';
            echo 'if (data === "Success") {';
            echo '    alert("Your information has been added successfully. You will now be redirected to the catalog page.");';
            echo '    window.location = "../views/catalog.php";';
            echo '} else {';
            echo '    alert("Error: " + data);';
            echo '}';
            echo '</script>';
        
    
?>
