<?php
    session_start();

    session_unset();
    session_destroy();

    session_start();
    $_SESSION['message'] = "Sucessfully logged out";

    header('location: login.php');
    exit();
?>