<?php
    $username = "root";
    $password = "";

    $db = mysqli_connect("localhost", $username, $password) or die("Connection failed!");
    mysqli_select_db("medconnect", $db);
?>