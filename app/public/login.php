<?php
session_start();
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];

    $result = $pdo->query("SELECT * FROM user WHERE username = '$form_username'");
    $user = $result->fetch();

    if (!$user) {
        $_SESSION['message'] = "Username does not exists";
        header("location: login.php");
        exit();
    }

    $correct_password = password_verify($form_password, $user['password']);
    if (!$correct_password) {
        $_SESSION['message'] = "Invalid password";
        header("location: login.php");
        exit();
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['message'] = "Successfully logged in";

    header("location: index.php");
    exit();
}
?>
<?php
include './partials/header.php';
?>
<?php

if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
    echo "<article><aside><p>" . $_SESSION['message'] . "</p></aside></article>";
    unset($_SESSION['message']);
}
?>
<div class="flex items-center flex-col w-screen">
    <div class="flex">
        <h1 class="p-10">Login</h1>
    </div>
    <form action="" method="post">
        <div>
            <input type="text" name="username" id="username" placeholder="Username" class=" bg-posts m-2 p-1 rounded-lg" />
        </div>

        <div>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-posts m-2 p-1 rounded-lg" />
        </div>

        <div>
            <input type="submit" value="Login" class="bg-button m-10 p-2 w-24 rounded-lg" />
        </div>
    </form>
    <p>Missing an account? </p><a href="register.php" class="underline">Register here.</a>
</div>

</div>
</body>

</html>