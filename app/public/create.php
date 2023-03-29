<?php
session_start();
require_once "database.php";
if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
    exit();
}

$sqlquery = "SELECT * FROM posts";
$result = $pdo->query($sqlquery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_text = trim($_POST["text"]);
    $user_id = $_SESSION['user_id'];
    $title = trim($_POST["title"]);


    if (!empty($form_text)) {
        $sqlquery = "INSERT INTO posts (`text`, `user_id`, `title`) VALUES ('$form_text', $user_id, '$title')";

        $_SESSION['message'] = "New post added";
        $sqlStatement = $pdo->query($sqlquery);
        header("location: index.php");
    }
}
?>


<?php
include "./partials/header.php";
?>
<div class="flex items-center flex-col w-screen">
    <div class="">
        <h1 class="p-10">Create page</h1>
    </div>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="m-1 ">
            <input type="text" name="title" id="title" placeholder="Title" class="bg-posts  border-none rounded-lg pl-2 p-1 " required>
        </div>
        <div class="m-1">
            <textarea name="text" id="text" cols="30" rows="10" class="bg-posts focus:outline-none rounded-lg pl-2 p-1" placeholder="Write your text here"></textarea>
        </div>
        <div class="bg-button m-10 p-2 w-24 rounded-lg">
            <input type="submit" value="Submit" class="  ">
        </div>
    </form>
</div>
</div>
</body>

</html>