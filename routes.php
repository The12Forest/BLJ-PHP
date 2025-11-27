<?php

$page = basename($_SERVER['REQUEST_URI'] ?? '');

$routes = [
    'Abschluss'      => 'views/home_view.php',
    'register'       => 'views/register_view.php',
    'blogs'          => 'views/blog_view.php',
    'login'          => 'views/login_view.php',
    // 'about'         => 'views/about_view.php'
];

if (array_key_exists($page, $routes)) {
    require $routes[$page];
} 
else {
    require 'views/404_view.php';
    http_response_code(404);
}

