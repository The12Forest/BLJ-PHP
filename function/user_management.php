<?php 



function login($user, $passwd) {
    global $userDB;
    
    $stmt = $userDB->prepare("SELECT ID, Username, Name, PW FROM users WHERE username = :username");
    $stmt->execute(['username' => $user]);
    $userCheck = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($userCheck) {
        if ($passwd == $userCheck["PW"]) {
            return true;
        } else {
            return false;
        }
    }
    

}

function get_USER($user) {
    global $userDB;
    
    $stmt = $userDB->prepare("SELECT ID, Username, Name, IMG FROM users WHERE username = :username");
    $stmt->execute(['username' => $user]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    return $userData;
}


function register($name, $username, $passwd, $img = 'images/User.jpg') {
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






function image($username) {
    global $userDB;


    $stmt = $userDB->prepare("SELECT ID, IMG FROM users WHERE Username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // ERROR in IMAGE

    $stmt = $userDB->prepare("SELECT * FROM img WHERE ID = :id");
    $stmt->execute(['id' => $user["IMG"]]);

    $image = $stmt->fetch(PDO::FETCH_ASSOC);


    return $image["img"];
    
}


function save_Image($user, $image) {
    global $userDB;

    $imageData = file_get_contents($image);

    $stmt = $userDB->prepare("INSERT INTO img (img) VALUES (:img)");
    $stmt->execute(['img' => $imageData]);
    $imageDB = $stmt->fetchAll();
    $lastInsertId = $userDB->lastInsertId();


    //Edit user image
    $stmt = $userDB->prepare("UPDATE users SET IMG = :img WHERE Username = :username");
    $stmt->execute(['img'       => $lastInsertId, 
                    'username'  => $user]);



    return true;
}