<?php

namespace App\Helpers;


use App\Models\User;

class Session
{

    public function isUser()
    {
        return isset($_SESSION['user']);
    }

    /**
     * @return User
     */
    public function getUser()
    {
        if($this->isUser())
            return unserialize($_SESSION['user']['user']);
        else
            return null;
    }

    public function getUserId()
    {
        return $_SESSION['user']['id'];
    }

    public function getUserLastUpdate()
    {
        return $_SESSION['user']['lastUpdate'];
    }

    /**
     * @param $user User
     */
    public function setUser($user)
    {
        $_SESSION['user']['id'] = $user->getId();
        $_SESSION['user']['user'] = serialize($user);
        $_SESSION['user']['lastUpdate'] = time();
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function setFlash($name, $value, $type = 'success')
    {
        $_SESSION['flashbag'][$name] = ['value' => $value, 'type' => $type];
    }

    public function hasFlash($name)
    {
        return isset($_SESSION['flashbag'][$name]);
    }

    public function getFlash($name)
    {
        $flash = false;
        if(isset($_SESSION['flashbag'][$name])) {
            $flash = $_SESSION['flashbag'][$name];
            unset($_SESSION['flashbag'][$name]);
        }

        return $flash;
    }

    public function getFlashbag()
    {
        $flashbag = $_SESSION['flashbag'];
        $_SESSION['flashbag'] = [];

        return $flashbag;
    }
}