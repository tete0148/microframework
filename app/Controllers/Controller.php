<?php

namespace App\Controllers;

use Interop\Container\ContainerInterface;

class Controller {

    protected $app;

    public function __construct(ContainerInterface $container)
    {
        $this->app = $container;
    }
}