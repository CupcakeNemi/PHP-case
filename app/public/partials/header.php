<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dist/output.css">
    <title>Namnlös PHP Case</title>
</head>

<body class="font-poppins text-lightFont bg-background">
    <div class=" ">
        <div class="flex  bg-background">
            <header class="bg-gradient-to-b from-upperPink to-lowerPink w-[200px] h-screen">
                <div class="flex flex-col text-darkFont">
                    <a href="index.php" class="p-2 font-medium "> Dashboard</a>
                    <a href="logout.php" class="p-2 font-medium">Logout</a>
                    <a href="login.php" class="p-2 font-medium">Login</a>
                    <a href="create.php" class="p-2 font-medium">Create page</a>

                    <div id="Pages" class="p-2">
                        <div class=" font-medium"><p>Pages</p></div>
                        <?php
                        // Query the database
                        $sqlquery = "SELECT * FROM posts";
                        $result = $pdo->query($sqlquery);

                        // Render the data
                        echo '<div class="pl-2 ">';
                        while ($row = $result->fetch()) {
                            $id = $row['id'];
                            echo '<div class="">';
                            echo '<a href="view.php?id=' . $row['id'] . '" class="pt-8"><h3>' . $row['title'] . '</h3></a>';
                            // echo '<div class=""><p>' . $row['date'] . '</p></div>';
                            "</div>";
                        }
                        echo '</div>';

                        ?>
                    </div>
                </div>
        </div>
        </header>


        <!-- 
</div>
</body> 
</html>
-->