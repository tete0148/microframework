<?php

namespace App\Helpers;


class Session
{
    public function setFlash($name, $content, $type = 'success')
    {
        $_SESSION['flashbag'][$name] = ['content' => $content, 'type' => $type];
    }

    public function getFlash($name)
    {
        $flash = $_SESSION['flashbag'][$name];
        unset($_SESSION['flashbag'][$name]);

        return $flash;
    }

    public function getFlashbag()
    {
        $flashbag = $_SESSION['flashbag'];
        $_SESSION['flashbag'] = [];

        return $flashbag;
    }
}