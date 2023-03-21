<?php 
    session_start();
    require_once "database.php";
?>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/input.css">
    <title>Namnlös PHP Case</title>
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
    <h1>Dashboard</h1>
    <?php 
        // Query the database
        $sqlquery = "SELECT * FROM posts";
        $result = $pdo->query($sqlquery);

        // Render the data
        echo "<section>";
        while($row = $result->fetch()) {
            $id = $row['id'];
            echo "<aside>
                    <p>" . $row['text'] . "</p>
                    <div>
                        <a href='delete.php?id=$id'>Delete</a>
                        <a href='edit.php?id=$id'>Edit</a>
                    </div>
                </aside>
                <hr>";
        }
        echo "</section>";

    ?>
    </div>
</body>
</html>