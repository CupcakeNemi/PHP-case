<?php
session_start();
require_once "database.php";

if(!isset($_SESSION["user_id"])){
    header("location: login.php");
    exit();
}

$sqlquery = "SELECT * FROM posts";
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/input.css">
    <title>Namnlös PHP Case - Create page</title>
</head>
<body>
<div class="super-container">
    <?php
    include './partials/header.php';
    ?>
    <h1>Create page</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"></form>
</div>
</body>
</html>