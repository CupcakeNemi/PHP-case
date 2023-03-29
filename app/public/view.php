<?php
session_start();
require_once "database.php";
include './partials/header.php';
require_once "Parsedown.php";
?>

<?php
$id = $_GET['id'];
$sqlquery = "SELECT * FROM posts WHERE id=$id";
$result = $pdo->query($sqlquery);
$entry = $result->fetch();
?>
<div class="flex items-center flex-col w-screen">
    <?php
    echo "<h1 class='m-10 p-4 bg-posts rounded-lg'>" . $entry['title'] . "</h1>";
    ?>
    <div class="m-10 mx-40 p-8 bg-posts rounded-lg">
        <?php
        $Parsedown = new Parsedown();
        $htmlText = $Parsedown->text($entry['text']);
        echo $htmlText;
        ?>
    </div>
</div>
</div>
</body>

</html>