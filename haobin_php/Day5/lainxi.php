<?php
    $age = $_GET["age"];
    session_start();
    $_SESSION["sAge"] = $age;
    print_r($_SESSION);
?>
