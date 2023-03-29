<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dist/output.css">
    <script src="https://kit.fontawesome.com/7624ff4de6.js" crossorigin="anonymous"></script>
    <title>Namnlös PHP Case</title>
</head>

<body class="font-poppins text-lightFont bg-background">
    <div class=" ">

        <div class="flex  bg-background">
            <header class="bg-gradient-to-b from-upperPink to-lowerPink w-[200px] min-h-full h-screen fixed ">

                <div class="flex flex-col text-darkFont">
                    <div class="flex p-2   justify-center items-center">
                        <h1 class="text-lg font-semibold"><?= $_SESSION['username']; ?></h1>
                    </div>
                    <a href="index.php" class="p-2 font-medium "> <i class="fa-solid fa-table-cells-large pr-2"></i>Dashboard</a>
                    <a href="create.php" class="p-2 font-medium"><i class="fa-solid fa-file-circle-plus pr-2"></i>Create page</a>

                    <div id="Pages" class="p-2">
                        <div class=" font-medium">
                            <p><i class="fa-solid fa-file pr-2"></i>Pages</p>
                        </div>
                        <?php

                        $sqlquery = "SELECT * FROM posts";
                        $result = $pdo->query($sqlquery);

                        echo '<div class="pl-2 ">';
                        while ($row = $result->fetch()) {
                            $id = $row['id'];
                            echo '<div class="">';
                            echo '<a href="view.php?id=' . $row['id'] . '" class="pt-8"><h3><i class="fa-solid fa-angle-right pr-2"></i>' . $row['title'] . '</h3></a>';
                            "</div>";
                        }
                        echo '</div>';

                        ?>
                    </div>
                    <div class="fixed left-12 bottom-12">
                        <?php
                        if (isset($_SESSION["user_id"])) {
                            echo  "<a href='logout.php' class=' font-medium '><i class='fa-solid fa-arrow-right-to-bracket pr-2'></i>Logout</a>";
                        }
                        if (!isset($_SESSION["user_id"])) {
                            echo  "<a href='logout.php' class='p-2 font-medium'><i class='fa-solid fa-arrow-right-to-bracket pr-2'></i>Login</a>";
                        }
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