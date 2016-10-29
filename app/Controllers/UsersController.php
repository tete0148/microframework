<?php

namespace App\Controllers;


use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class UsersController extends Controller
{

    public function index(Request $req, Response $res, $params = [])
    {
        $users = $this->app['dao.users']->findAll();

        return $this->app['view']->render($res, 'users.twig', ['users' => $users]);
    }

    public function create(Request $req, Response $res, $params = [])
    {
        $user = new User();
        $user->setFname('Théo');
        $user->setLname('Champion');
        $user->setEmail('theoc.01@live.fr');
        $user->setPseudo('tete0148');
        $user->setPassword(hash('sha256', 'toto'));
        $user->setPasswordSalt(hash('sha256', uniqid()));
        $user->setCreatedAt(date('Y-m-d H:i:s'));

        $this->app['dao.users']->save($user);
    }
}