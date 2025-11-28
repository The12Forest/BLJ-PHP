<?php
$error = null;
$adress = "login";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Change-Password"]) && isset($_POST["Change-Password2"]) && isset($_COOKIE["username"])) {
        if ($_POST["Change-Password"] == $_POST["Change-Password2"]) {
            change_Passwd($_COOKIE["username"], hash("sha256", $_POST["Change-Password"]));
            require "views/user/successfull.php";
        } else {
            $error = "Passwords do not match!";
            require "views/user_view.php";
        }
    } else {
        $error = "Not all variables arrived on the server!";
        require "views/user/not_successfull.php";
    }
} else { ?>
    <meta http-equiv="refresh" content="3; url=">
<?php } ?>

