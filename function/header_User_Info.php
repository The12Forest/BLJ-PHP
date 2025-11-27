<?php

require "function/user_management.php"; //Eigene Bibliothek für login() und user()


$loggedIN = null;
//TODO Pfad zum user IMG an $UserIMG from Database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

if (isset($_COOKIE['remember'])) { 

    $username = $_COOKIE["username"];
    $password = $_COOKIE["passwd"];
    
    $loggedIN = login($username, $password);

    // echo $username;
    // echo $password;
}