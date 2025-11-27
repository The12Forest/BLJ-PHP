<?php 
    $pdo = new PDO('mysql:host=10.10.20.188;dbname=urs', 'bljuser', 'hallo123', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

    $stmt = $pdo->prepare('select *  from bljblogs');
    $stmt->execute();
    $bloggers = $stmt->fetchAll();
?>

<link rel="stylesheet" href="css/home.css">


<p class="WilkommenDIV">Willkommen in der Hall of Fame der weltbesten Blogger.</p>

<div class="Credit-Div">
    <p class="Applaus">👏 Applaus für: </p>
    <ul>
        <?php foreach ($bloggers as $blogger) : ?> 
            <li> 
                <a target="_blank" href="<?= $blogger["blog_url"]?>"><?= $blogger["name_lernender"] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

