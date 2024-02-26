<?php
    /*
        - This file is the connection to the database.
    */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "codeedb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Check connection
    if (!$conn) {
        echo "Connection failed: ";
    }
?>