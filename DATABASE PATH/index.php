<?php


$path = trim($_SERVER['REQUEST_URI'], '/');

$path = parse_url($path, PHP_URL_PATH);

switch ($path) {
    case '':
        require 'home.php';
        break;

    case 'about':
        require 'about.php';
        break;

    case 'contact':
        require 'contact.php';
        break;

    default:
        http_response_code(404);
        echo "404 - Page not found";
        break;
}