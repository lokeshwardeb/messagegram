<?php
// get the url typed on the url bar
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$Routes = [
    '/' => __DIR__ . '/controllers/index.php',
    '/dashboard' => __DIR__ . '/controllers/index.php',
    '/inbox' => __DIR__ . '/controllers/message_inbox.php',
    '/create_new_account' => __DIR__ . '/controllers/create_new_account.php',
    '/login' => __DIR__ . '/controllers/login.php',
    '/logout' => __DIR__ . '/controllers/logout.php',
    '/inbox_check' => __DIR__ . '/controllers/inbox_check.php',
    '/my_profile' => __DIR__ . '/controllers/my_profile.php',
];

// checking if the routes is registed on the the system

if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    require __DIR__ . '/controllers/error_page.php';
}




?>