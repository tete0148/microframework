<?php

use App\DAO\UserDAO;
use App\Helpers\Assets;
use App\Helpers\Security;
use tete0148\EasyForm\EasyForm;

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
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if (!PROD) die($e->getMessage());
        }
    return $pdo;
};

$configuration = [
    'settings' => [
        'displayErrorDetails' => !PROD,
        'addContentLengthHeader' => false,
        'determineRouteBeforeAppMiddleware' => true
    ]
];

$container = new Slim\Container($configuration);

require 'helpers.php';
require 'dao.php';

/**
 * @param $container
 * @return \Slim\Views\Twig
 */
$container['view'] = function($container) use($config) {
    $view = new \Slim\Views\Twig($config['views_path'], [
        'cache' => $config['cache_path'],
        'debug' => !PROD
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    if(!PROD)
        $view->addExtension(new Twig_Extension_Debug());

    $view->getEnvironment()->addGlobal('app', $container);
    $view->getEnvironment()->addGlobal('assets_root', $config['assets_root']);

    return $view;
};

$app = new \Slim\App($container);

/**
 * Middleware which is updating the user in session every x seconds
 */
$app->add(function (\Slim\Http\Request $request, \Slim\Http\Response $response, callable $next) use ($app,$config) {
    if($app->getContainer()['session']->isUser()) {
        if($app->getContainer()['session']->getUserLastUpdate() + $config['userSessionUpdateInterval'] < time()) {
            $app->getContainer()['session']->setUser($app->getContainer()['dao.users']->find($app->getContainer()['session']->getUserId()));
        }
    }

    return $next($request, $response);
});

Security::setConfig($config);
EasyForm::setResourcesPath(__DIR__ . '/../views/forms');

//controller caller
function c($string)
{
    $string = explode('::', $string);
    $rtrn = "App\\Controllers\\" . $string[0] . 'Controller:' . ((!isset($string[1])) ? 'index' : $string[1]);
    return $rtrn;
}

require 'routes.php';

$app->run();