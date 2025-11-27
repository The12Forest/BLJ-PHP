<link rel="stylesheet" href="css/blogs.css">
<?php 
    require 'models/blog_model.php';
?>
<div class="div_Fullpage">
    <h1 class="h1_Title">Blog</h1>
    <div class="div_Blogs">
        <?php foreach ($posts as $post) : ?> 
            <div class="div_Blog"> 
                <h2><?= $post["post_title"] ?></h2>
                
                <p><?= $post["post_text"] ?></p>
                
                <p>Geschrieben von: <?= $post["created_by"] ?> am <?= $post["created_at"] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
