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

function change_User($username, $userold) {
    global $userDB;

    $stmt = $userDB->prepare("SELECT ID FROM users WHERE Username = :username");
    $stmt->execute(['username' => $username]);

    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        return false;
    }

    $stmt = $userDB->prepare("UPDATE users SET Username = :username WHERE Username = :oldusername");
    $stmt->execute(['username'       => $username,
                    'oldusername'    => $userold]);

    return true;
}




function image($username) {
    global $userDB;


    $stmt = $userDB->prepare("SELECT ID, IMG FROM users WHERE Username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $stmt = $userDB->prepare("SELECT * FROM img WHERE ID = :id");
        $stmt->execute(['id' => $user["IMG"]]);
    
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
        return $image["img"];
    }
}


function save_Image($user, $image) {
    global $userDB;

    //Get existing ID
    $stmt = $userDB->prepare("SELECT ID, IMG FROM users WHERE Username = :username");
    $stmt->execute(['username' => $user]);
    $imagID_OLD = $stmt->fetch(PDO::FETCH_ASSOC);

    //Save image in DB
    $imageData = file_get_contents($image);

    $stmt = $userDB->prepare("INSERT INTO img (img) VALUES (:img)");
    $stmt->execute(['img' => $imageData]);
    $imageDB = $stmt->fetchAll();
    $lastInsertId = $userDB->lastInsertId();


    //Edit user image entry
    $stmt = $userDB->prepare("UPDATE users SET IMG = :img WHERE Username = :username");
    $stmt->execute(['img'       => $lastInsertId, 
                    'username'  => $user]);

    //delete the image except if it is 1 because it is the default

    if ($imagID_OLD["IMG"] != 1) {
        $stmt = $userDB->prepare("DELETE FROM img WHERE ID = :ID");
        $stmt->execute(['ID' => $imagID_OLD["IMG"]]);
    }

    return true;
}


function change_Passwd($username, $passwd) {
    global $userDB;

    try {
        $stmt = $userDB->prepare("UPDATE users SET PW = :passwd WHERE Username = :username");
        $stmt->execute(['passwd' => $passwd, 'username' => $username]);

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false; // Kein User gefunden oder Passwort identisch
        }

    } catch (PDOException $e) {
        return false;
    }

}

