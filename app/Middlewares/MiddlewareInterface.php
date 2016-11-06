<?php


namespace App\Middlewares;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

interface MiddlewareInterface
{
    /**
     * MiddlewareInterface constructor.
     * @param $container Container
     */
    public function __construct($container);
    public function __invoke(Request $request, Response $response, callable $next);
}