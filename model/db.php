<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'quanlynhahang';
    $connect = mysqli_connect($server, $user, $pass);
    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else {
        mysqli_select_db($connect, $mydb);
    }
?>