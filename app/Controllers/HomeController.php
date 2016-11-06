<?php

namespace App\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller implements PermissionsInterface
{

    private static $permission = [
        'index' => 'home.index'
    ];

    public function index(Request $req, Response $res, $params = [])
    {
        return $this->app['view']->render($res, 'test.twig');
    }

    public static function getPermissions()
    {
        return self::$permission;
    }
}