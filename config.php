<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ucapandoa";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        echo "Connection Failed.";
    }
?>