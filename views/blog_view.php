<link rel="stylesheet" href="css/blogs.css">
<?php 
    $topic = "Default";
    $posts = blogs($topic);

?>
<div class="div_Fullpage">
    <h1 class="h1_Title">Blog</h1>
    <div class="div_Blogs">
        <?php if ( sizeof($posts) != 0) { ?>
            <?php foreach ($posts as $post) : ?> 
                <div class="div_Blog"> 
                    <h2><?= $post["Title"] ?></h2>
                    <p><?= $post["Blog"] ?></p>
                    
                </div>
            <?php endforeach; ?>
        <?php } else {
            echo "<h1 class=h1_Title >No Blogs Found</h1>";
        }?>
    </div>
</div>


