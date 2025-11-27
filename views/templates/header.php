<?php require 'function/header_User_Info.php' ?>

<header>
    <nav class="Navigation">
        <link rel="stylesheet" href="css/nav.css">

        <a href="/Abschluss/" class="Sitelogo">
            <img class="LogoIMG" src="images/SiteLogo.png" alt="Logo">
        </a>

        <div class="User">
            <a class="botton_Blog" href="blogs">Blogs</a>
            <?php if($loggedIN): ?>
                <a class="botton_Blog" href="create_Blog">Post</a>
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