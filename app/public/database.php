<?php 
 //* Linode
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'db_user_linode');
// define('DB_PASSWORD', 'RxDhBntsV6cXUYfh');
// define('DB_NAME', 'db_lamp_app');

//* Local
define('DB_SERVER', 'mysql');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'db_root_password');
define('DB_NAME', 'db_lamp_app');

try {

    $pdo = new PDO("mysql:host=". DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->exec("CREATE TABLE IF NOT EXISTS user (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

     //* Posts
    $pdo->exec("CREATE TABLE IF NOT EXISTS posts (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        text TEXT NOT NULL,
        user_id INT(11) UNSIGNED NOT NULL, 
        `date` DATE DEFAULT CURRENT_TIMESTAMP, 
        `title` VARCHAR(45), 
        `image` BLOB,
        CONSTRAINT `fk_posts_user`
            FOREIGN KEY (user_id)
            REFERENCES user(id)
            ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");


} catch (PDOException $err) {
    die("Error: Could not connect. ". $err->getMessage());
}
?>