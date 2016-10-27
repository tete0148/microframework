<?php

namespace App\Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

class RequireGuestMiddleware implements MiddlewareInterface
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        return $next($request, $response);
    }
}