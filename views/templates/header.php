<?php require 'function/get_user_info.php' ?>

<header>
    <nav class="Navigation">
        <link rel="stylesheet" href="css/nav.css">

        <a href="" class="Sitelogo">
            <img class="LogoIMG" src="images/SiteLogo.png" alt="Logo">
        </a>

        <div class="User">
            <a class="botton_Blog" href="blogs">Blogs</a>
            <?php if($loggedIN): ?>
                <img src="<?= $UserIMG ?>" alt="UserIMAGE">
            <?php else: ?>
                <a class="LoginButton" href="login">Login</a>
            <?php endif; ?>
        </div>

        <!-- <ul>
            <li class="nav-left"><a href="home">Home</a></li>
            <li class="nav-left"><a href="blog">Blog</a></li>
            <li class="nav-left"><a href="about">About</a></li>
        </ul> -->
    </nav>
</header>