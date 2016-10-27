<?php

namespace tete0148\App;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Middlewares {

    private function __construct(){}

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return ResponseInterface
     */
    public static function requireGuest(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        //if user is logged in
            $response = $next($request, $response);
        //else
            //redirect user

        return $response;
    }
}