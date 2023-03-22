<?php
session_start();
require_once "database.php";
// handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];

    if (!$form_username || !$form_password) {
        $_SESSION['message'] = "All fields must be filled";
        header('location: register.php');
        exit();
    }

    $result = $pdo->query("SELECT * FROM user WHERE username = '$form_username'");
    $user = $result->fetch();

    if ($user) {
        if (empty($form_username)) {
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

<?php
include './partials/header.php';
?>
<?php
// Write out message from other pages if exists
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
    echo "<article><aside><p>" . $_SESSION['message'] . "</p></aside></article>";
    unset($_SESSION['message']); // remove it once it has been written
}
?>
<div class="flex items-center flex-col w-screen">
<div class="flex">
    <h1 class="p-10">Register</h1>
</div>
    <form action="" method="post">
    <div>
    <input type="text" name="username" id="username" placeholder="Username" class=" bg-posts m-2 p-1 rounded-lg"/>
    </div>

    <div>
    <input type="password" name="password" id="password" placeholder="Password" class="bg-posts m-2 p-1 rounded-lg"/>
    </div>

    <div>
    <input type="submit" value="Register" class="bg-button m-10 p-2 w-24 rounded-lg"/>
    </div>
    </form>

<div class="flex items-center flex-col">
    <p>Already have an account?</p> 
    <a href="login.php" class="underline">Login here.</a> 
</div>
</div>
</div>
</body>

</html>