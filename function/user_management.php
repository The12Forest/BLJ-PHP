<?php 

require "database.php";

function login($user, $passwd) {
    global $userDB;
    
    $stmt = $userDB->prepare("SELECT ID, Username, Name, PW FROM users WHERE username = :username");
    $stmt->execute(['username' => $user]);
    $userCheck = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if ($passwd == $userCheck["PW"]){
        return true;
    } else {
        return false;
    }
}

function get_USER($user) {
    global $userDB;
    
    $stmt = $userDB->prepare("SELECT ID, Username, Name, PW FROM users WHERE username = :username");
    $stmt->execute(['username' => $user]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    return $userData;
}


function register($name, $username, $passwd) {
    global $userDB;


    $stmt = $userDB->prepare("SELECT ID FROM users WHERE Username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);

    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        return false;
    }


    $insert = $userDB->prepare("INSERT INTO users (Name, Username, PW) VALUES (:name, :username, :pw)");
    $insert->execute([
        'username' => $username,
        'pw'       => $passwd, 
        'name'     => $name
    ]);

    return true;
}
