<?php
$page = basename($_SERVER['REQUEST_URI'] ?? '');

if ($page == "logout") {
    setcookie("passwd", "", time() - 3600, "/", "", false, false);
    setcookie("remember", "", time() - 3600, "/", "", false, false);
    setcookie("username", "", time() - 3600, "/", "", false, false);
} 

?>

<?php 
require "function/database.php";
require "function/user_management.php"; //Eigene Bibliothek für login() und user()
require "function/blogs.php";


?>

<!doctype html>
<html lang="en">
    <head>
        <!-- todo: Anpassen an deine Umgebung -->
        <!-- <base href="https://blj-ict-bz.ch/2025/blogs/blj_starterkit/"> -->
        <base href="https://10.10.20.155/Abschluss/">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/styles.css">
        <title>Blog</title>
    </head>
    <body>
        <?php 
            require "views/templates/header.php";
        ?>

        <?php 
            require "routes.php"; 
        ?>
    </body>
</html>

