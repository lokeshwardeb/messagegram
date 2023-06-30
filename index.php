<?php
// get the url typed on the url bar
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$Routes = [
    '/' => __DIR__ . '/controllers/index.php',
    '/dashboard' => __DIR__ . '/controllers/index.php',
];

// checking if the routes is registed on the the system

if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . '/controllers/error_page.php';
}




?>