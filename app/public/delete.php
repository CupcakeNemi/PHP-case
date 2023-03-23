<?php
    session_start();
    require_once "database.php";
?>
<?php
    $idToRemove = $_GET['id'];
    $idToRemove = (int)$idToRemove;

    if (isset($idToRemove)){
        $sqlquery = "DELETE FROM posts WHERE id=$idToRemove";
        $pdo->query($sqlquery);

        $_SESSION['message'] = "Deleted post";
        header("location: index.php");
    }
?>
    <h1>Delete post</h1>
</div>
</body> 
</html>