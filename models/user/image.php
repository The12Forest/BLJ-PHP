<?php
$error = null;
$adress = "user";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["Change-Picture"]) && isset($_COOKIE["username"])) {
    if ($_FILES["Change-Picture"]["error"] == UPLOAD_ERR_OK) {
        $tempFile = $_FILES["Change-Picture"]["tmp_name"];
        save_Image($_COOKIE["username"], $tempFile);
        require "views/user/successfull.php";
    } else {
        $error = "Error uploading file: " . $_FILES["Change-Picture"]["error"];
        require "views/user/not_successfull.php";
    }
} else { ?>
    <meta http-equiv="refresh" content="3; url=">
<?php } ?>
