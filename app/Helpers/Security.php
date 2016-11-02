<?php

namespace App\Helpers;


class Security
{

    private static $config = NULL;

    public static function hash($toHash, $salt = '')
    {
        return self::hash('sha256', self::$config['app_salt']) . $salt . $toHash . substr(self::$config['app_salt'] . $salt, 0, len(self::$config['app_salt'])/2);
    }

    public function checkHash($toCheck, $hash, $salt = '')
    {
        return self::hash('sha256', self::$config['app_salt']) . $salt . $toCheck . substr(self::$config['app_salt'] . $salt, 0, len(self::$config['app_salt'])/2) === $hash;
    }

    public static function generateSalt()
    {
        return hash('sha256', uniqid() . microtime() . self::$config['app_salt']);
    }

    public static function setConfig($config)
    {
        self::$config = $config;
    }
}