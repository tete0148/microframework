<?php

use App\DAO\UserDAO;
use App\Helpers\Security;

require '../vendor/autoload.php';
require 'config.php';

//init PDO
$pdo = NULL;
$getPDO = function () use ($pdo, $config) {
    if(is_null($pdo))
        try {
            $informations = "mysql:host={$config['database']['HOST']};dbname={$config['database']['DB_NAME']}";
            $pdo = new PDO($informations, $config['database']['USER'], $config['database']['PASSWORD']);
            $pdo->exec('SET NAMES UTF-8');
        } catch (PDOException $e) {
            if (!PROD) die($e->getMessage());
        }
    return $pdo;
};

$configuration = [
    'settings' => [
        'displayErrorDetails' => !PROD,
        'addContentLengthHeader' => false,
    ]
];

$container = new Slim\Container($configuration);

require 'helpers.php';
require 'dao.php';

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

Security::setConfig($config);
var_dump($config);
//controller caller
function c($string)
{
    $string = explode('::', $string);
    $rtrn = "App\\Controllers\\" . $string[0] . 'Controller:' . ((!isset($string[1])) ? 'index' : $string[1]);
    return $rtrn;
}

require 'routes.php';

$app->run();