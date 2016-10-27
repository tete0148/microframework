<?php

namespace App\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller {
    
    public function index(Request $req, Response $res, $params = [])
    {
        return $this->app['view']->render($res, 'test.twig');
    }
}