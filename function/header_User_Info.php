<?php




$loggedIN = null;
//TODO Pfad zum user IMG an $UserIMG from Database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

if (isset($_COOKIE['remember'])) { 

    $username = $_COOKIE["username"];
    $password = $_COOKIE["passwd"];
    
    $loggedIN = login($username, $password);

    if ($loggedIN) {
        $user = get_USER($username);
    }

    // echo $username;
    // echo $password;
}

if (isset($_COOKIE["username"])) {
    $image = image($_COOKIE["username"]);
}
