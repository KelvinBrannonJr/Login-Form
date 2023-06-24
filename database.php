<?php 
    $DB_SERVER = "localhost";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_NAME = "userdb";

    $conn = mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME);

    if(mysqli_connect_errno()){
        echo "<h2>Could not connect to database..</h2>";
    }

?>