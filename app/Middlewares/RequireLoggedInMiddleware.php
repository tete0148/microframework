<?php

namespace App\Middlewares;


use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class RequireLoggedInMiddleware implements MiddlewareInterface
{

    /**
     * @var Container
     */
    private $container;

    public function __invoke(Request $request, Response $response, callable $next)
    {
        global $app;
        $app = $app->getContainer();
        if(!$app['session']->isUser()) {
            $app['session']->setFlash('not_logged_in', 'Vous devez être connecté', 'danger');
            return $response->withRedirect($app['router']->pathFor('login'));
        }

        return $next($request, $response);
    }

    /**
     * MiddlewareInterface constructor.
     * @param $container Container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }
}