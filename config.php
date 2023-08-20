<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ucapandoa";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        echo "Connection Failed.";
    }

    // Set zona waktu ke Asia/Jakarta dengan offset +07:00
    mysqli_query($conn, "SET time_zone = '+07:00'");
?>
