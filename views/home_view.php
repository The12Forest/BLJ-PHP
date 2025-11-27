<?php 
    require "models/other_model.php";
?>
<link rel="stylesheet" href="css/home.css">


<p class="WilkommenDIV">Willkommen in der Hall of Fame der weltbesten Blogger.</p>

<div class="Credit-Div">
    <p class="Applaus">👏 Applaus für: </p>
    <ul>        
        <?php foreach ($bloggers as $blogger) : ?> 
            <li> 
                <?= $blogger["blog_von"] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>