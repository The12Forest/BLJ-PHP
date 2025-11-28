<?php 
    $stmt = $otherDB->prepare('select * from bljblogs');
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

