<?php
session_start();
ob_start();
require_once "database.php";
include './partials/header.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_title =  trim($_POST["title"]);
    $form_text = trim($_POST["text"]);
    $form_id = trim($_POST["id"]);

    if (!empty($form_text)) {
        $sqlquery = "UPDATE posts SET title='$form_title',text='$form_text' WHERE id= $form_id";
        echo $sqlquery;

        $sqlstmt = $pdo->query($sqlquery);
        $_SESSION['message'] = "successfully edited post entry";
        header("location: index.php");
    }
} else {
    $id = $_GET['id'];
    $id = (int)$id;
    $sqlquery = "SELECT * FROM posts WHERE id = $id";

    $result = $pdo->query($sqlquery);
    $row = $result->fetch();
    $old_title = $row['title'];
    $old_text = $row['text'];
}
ob_end_flush();
?>
<div class="flex items-center flex-col w-screen">
    <div>
        <h1 class="p-10">Edit Post</h1>
    </div>
    <div>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="number" name="id" id="id" value="<?= $id ?>" hidden>
            <div class="m-1 ">
                <input type="text" name="title" id="title" placeholder="Title" value="<?= $old_title ?>" class="bg-posts  border-none rounded-lg pl-2 p-1 " required>
            </div>

            <div class="m-1">
                <textarea name="text" id="text" cols="30" rows="10" class="bg-posts focus:outline-none rounded-lg pl-2 p-1"><?php echo $old_text ?></textarea>
            </div>

            <div class=" bg-button m-10 p-2 w-24 rounded-lg pointer-events-auto">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
</div>
</body>

</html>