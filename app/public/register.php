<?php
    session_start();
    require_once "database.php";


    // handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $form_username = $_POST['username'];
        $form_password = $_POST['password'];

        if (!$form_username || !$form_password){
            $_SESSION['message'] = "All fields must be filled";
            header('location: register.php');
            exit();
        }

        $result = $pdo->query("SELECT * FROM user WHERE username = '$form_username'");
        $user = $result->fetch();

        if ($user) {
            if (empty($form_username)){
                $_SESSION['message'] = "Username cannot be empty";
            }
            $_SESSION['message'] = "Username is already taken";
            header("location: register.php");
            exit();
        } else {
            $hashed_password = password_hash($form_password, PASSWORD_DEFAULT);
            $pdo->query("INSERT INTO user (username, password) VALUES ('$form_username', '$hashed_password')");
            $_SESSION['message'] = "Successfully created user! Please login.";
            header("location: login.php");
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/input.css">
    <title>Namnlös PHP Case - Register</title>
</head>
<body>
<div class="super-container">
    <?php
    include './partials/header.php';
    ?>
        <?php 
        // Write out message from other pages if exists
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo "<article><aside><p>". $_SESSION['message'] . "</p></aside></article>";
            unset( $_SESSION['message']); // remove it once it has been written
        }
        ?>

        <h1>Register New User</h1>

        <div class="form">
        <form action="" method="post">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" />

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" />

            <input type="submit" value="Register" />
        </form>
        </div>

        <div class="redirect">
        <p>Already have an account? <a href="login.php">Login</a> here.</p>
        </div>
    </div>
</body>
</html>