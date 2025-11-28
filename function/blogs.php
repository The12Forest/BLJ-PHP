<?php

function blogs($topic) {
    global $userDB;
    // Get topic ID
    $stmt = $userDB->prepare("SELECT id, name FROM topics WHERE name = :topic");
    $stmt->execute([':topic' => $topic]);
    $topicID = $stmt->fetch(PDO::FETCH_ASSOC);


    $stmt = $userDB->prepare("SELECT * FROM blogs INNER JOIN users ON users.ID = blogs.UserID WHERE blogs.topic_id = :topic ORDER BY blogs.Date DESC;");
    $stmt->execute([':topic' => $topicID["id"]]);
    // $stmt->execute();
    $blogData = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $blogData;
}


function post($title, $content, $user, $topic) {
    global $userDB;
    
    $stmt = $userDB->prepare("SELECT ID, username FROM users WHERE username = :user");
    $stmt->execute(['user' => $user]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = $userDB->prepare("SELECT id, name FROM topics WHERE name = :topic");
    $stmt->execute(['topic' => $topic]);
    $topic = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user == "") {
        echo "User Invalide!";
        return false;
    } elseif ($topic == "") {
        echo "Topic Invalide!";
        return false;
    } else {
        $insert = $userDB->prepare("INSERT INTO blogs (UserID, Title, Blog, topic_id) VALUES (:UserID, :Title, :Blog, :topic_id)");
        $insert->execute([
            'UserID'   => $user["ID"],
            'Title'    => $title, 
            'Blog'     => $content,
            'topic_id' => $topic["id"]
        ]);
        return true;
    }
}