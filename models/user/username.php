<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Change-Username"]) && isset($_COOKIE["Username"]) && isset($_COOKIE["Passwd"])) {
    if (login($_COOKIE["Username"], $_COOKIE["Passwd"])) {
        
    }
}

// require "views/user/successful.php";