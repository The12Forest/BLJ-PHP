<?php 

// $otherDB = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_urs', 'd041e_urs_ro', 'c', [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
// ]);

// $user = new PDO('mysql:host=mysql2.webland.ch;dbname=bljic_mawaldburger', 'bljic_mawaldburger', 'db_BLJ_2025', [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
// ]);


$otherDB = new PDO('mysql:host=10.10.20.188;dbname=urs', 'bljuser', 'hallo123', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$userDB = new PDO('mysql:host=localhost;dbname=bljic_mawaldburger', 'bljic_mawaldburger', 'db_BLJ_2025', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);