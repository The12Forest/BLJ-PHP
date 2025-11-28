<?php
$error = null;
$adress = "";
$not_contact_Admin = null;




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Change-Username"]) && isset($_COOKIE["username"]) && isset($_COOKIE["passwd"])) {
    if (login($_COOKIE["username"], $_COOKIE["passwd"])) {
        if (change_User($_POST["Change-Username"], $_COOKIE["username"])) {
            $adress = "login";
            require "views/user/successfull.php";
        } else {
            if (get_USER($_COOKIE["username"])) {
                $error = "Username already in use!";
                $not_contact_Admin = true;
            } else {
                $error = "unknown";
            }
            require "views/user/not_successfull.php";
        }
    }
} else  { ?>
    <meta http-equiv="refresh" content="3; url=">
<?php } ?>



//todo fix all info on blog 
//fix user password change