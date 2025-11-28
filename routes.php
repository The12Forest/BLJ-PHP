<?php

$page = basename($_SERVER['REQUEST_URI'] ?? '');

$routes = [
    'Abschluss'                   => 'views/home_view.php',
    'register'                    => 'views/register_view.php',
    'blogs'                       => 'views/blog_view.php',
    'login'                       => 'views/login_view.php',
    'create_Blog'                 => 'views/create_Blog_view.php', 
    'user'                        => 'views/user_view.php',
    'user_username'               => 'models/user/username.php',
    'user_picture'                => 'models/user/image.php',
    'logout'                      => 'models/user/logout.php',
    'user_changepasswd'           => 'models/user/passwd.php'

];

if (array_key_exists($page, $routes)) {
    require $routes[$page];
} 
else {
    require 'views/404_view.php';
    http_response_code(404);
}

