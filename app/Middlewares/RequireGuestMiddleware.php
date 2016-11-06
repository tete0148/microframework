<?php

namespace App\Middlewares;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class RequireGuestMiddleware implements MiddlewareInterface
{
    /**
     * @var Container
     */
    private $container;


    /**
     * MiddlewareInterface constructor.
     * @param $container Container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response, callable $next)
    {
        global $app;
        $app = $app->getContainer();

        if($app['session']->isUser()) {
            $app['session']->setFlash('already_logged_in', 'Vous êtes déjà connecté', 'danger');
            return $response->withRedirect($app['router']->pathFor('index'));
        }

        return $next($request, $response);
    }
}