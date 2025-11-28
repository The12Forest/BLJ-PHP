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
                <a href="user"><img src="data:image/jpeg;base64,<?= base64_encode($image) ?>" alt="UserIMAGE"></a>
            <?php else: ?>
                <a class="botton_Blog" href="login">Post</a>
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