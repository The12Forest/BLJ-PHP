<?php 
require 'function/database.php';




$stmt = $otherDB->prepare('select *  from blogs');
$stmt->execute();

$bloggers = $stmt->fetchAll();
