<?php
    include 'config.php';

    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $asal = $_POST['asal'];
    $present = $_POST['present'];
    
    
    $sql = "INSERT INTO msg (name, msg, asal, present) VALUES ('$name', '$msg', '$asal', '$present')";
    $result = mysqli_query($conn, $sql);
    
    
    if ($result) {
        echo 1;
    }else {
        echo 0;
    }
?>