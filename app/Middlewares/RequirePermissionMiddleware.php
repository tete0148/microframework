<?php

namespace App\Middlewares;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class RequirePermissionMiddleware implements MiddlewareInterface
{

    private $container;

    /**
     * RequirePermissionMiddleware constructor.
     * @param $container Container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }


    public function __invoke(Request $request, Response $response, callable $next)
    {
        $controller = $request->getAttribute('route')->getCallable();
        $class = explode(':', $controller)[0];
        $method = explode(':', $controller)[1];
        $rules = call_user_func([$class, 'getPermissions']);
        $rule = $rules[$method];
        $user = $this->container['session']->getUser();
        if(isset($rules[$method]) && $user != null && !$user->hasPermission($rule)) {
            return $this->container['view']->render($response->withStatus(403), 'errors/403.twig');
        }
        return $next($request, $response);
    }
}