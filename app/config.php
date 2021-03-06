<?php

define('PROD', false);

//getting .ENV content
try {
    $env = file_get_contents('../.ENV');
} catch (Exception $e) {
    throw new Exception('Missing .ENV file in project root');
    die();
}
$temp = explode(PHP_EOL, $env);
$env = [];
foreach($temp as $item) {
    $t = explode('=', $item);
    $env[$t[0]] = trim($t[1]);
}
//creating config array
$config = [
        'database' => [
            'HOST' => $env['DB_HOST'],
            'DB_NAME' => $env['DB_NAME'],
            'USER' => $env['DB_USER'],
            'PASSWORD' => $env['DB_PASSWORD'],
        ],
        'app_salt' => $env['APP_SALT'],
        'views_path' => '../views',
        'cache_path' => '../cache',
        'assets_root' => '/microframework/public/',
        'userSessionUpdateInterval' => 30, //secondes
    ];
if(PROD) {

} else {

}