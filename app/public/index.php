<?php
    session_start();
    require_once "database.php";
    include './partials/header.php';
?>
    <?php 
    // Write out message from other pages if exists
    
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo '<div id="message">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>
    <script>
        setTimeout(function(){
            document.getElementById('message').style.display = 'none';
        }, 2000);
    </script>
    <div class="flex items-center flex-col w-screen">

    <div class="flex">
    <h1 class="p-10">Dashboard</h1>
    </div>
    <?php 
        // Query the database
        $sqlquery = "SELECT * FROM posts";
        $result = $pdo->query($sqlquery);

        // Render the data
        echo '<div class=" ">';
        while($row = $result->fetch()) {
            $id = $row['id'];
            echo '<div class="bg-posts  px-7 pb-6  w-96 rounded-lg m-5">';
            echo '<div class="pt-6"><h3>' . $row['title'] . '</h3></div>';
            echo '<div><p>' . $row['text'] . '</p></div>';
            echo '<div class=""><p>' . $row['date'] . '</p></div>';
            echo "<div class='my-2 '>
                        <a href='delete.php?id=$id' class='bg-button px-3 py-1 w-24 mr-2 rounded-lg'>Delete</a>
                        <a href='edit.php?id=$id' class='bg-button w-24 px-3 py-1 ml-2 rounded-lg'>Edit</a>
                        </div></div>";
        }
        echo '</div>';

    ?>
        </div>
    </div>
</body>


</html>
