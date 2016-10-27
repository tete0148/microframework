<?php


namespace App\Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

interface MiddlewareInterface
{
    public function __invoke(Request $request, Response $response, callable $next);
}