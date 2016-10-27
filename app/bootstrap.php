<?php

use App\DAO\UserDAO;

require '../vendor/autoload.php';
require 'config.php';

//init PDO
$pdo = NULL;
$getPDO = function () use ($pdo, $config) {
    if(is_null($pdo))
        try {
            $pdo = new PDO("mysql:host={$config['database']['HOST']};dbname={$config['database']['DB_NAME']}", $config['database']['USER'], $config['database']['PASSWORD']);
            $pdo->exec('SET NAMES UTF-8');
        } catch (PDOException $e) {
            if (!PROD) die('Enable to connect to the database');
        }
};

$configuration = [
    'settings' => [
        'displayErrorDetails' => !PROD,
        'addContentLengthHeader' => false,
    ]
];

$container = new Slim\Container($configuration);

$container['dao.users'] = function() use ($getPDO) {
    return new UserDAO($getPDO);
};

$container['view'] = function($container) use($config) {
    $view = new \Slim\Views\Twig($config['views_path'], [
        'cache' => $config['cache_path'],
        'debug' => !PROD
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    if(!PROD)
        $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$app = new \Slim\App($container);

//controller caller
function c($string)
{
    $string = explode('::', $string);
    $rtrn = "App\\Controllers\\" . $string[0] . 'Controller:' . ((isset($string[1])) ? 'index' : $string[1]);
    return $rtrn;
}

require 'routes.php';

$app->run();