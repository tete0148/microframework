<?php

namespace App\Helpers;


class Security
{

    private static $config = NULL;

    private function __construct(){}

    public static function hash($toHash, $salt = '')
    {
        return hash('sha256', self::$config['app_salt'] . $salt . $toHash . substr(self::$config['app_salt'] . $salt, 0, strlen(self::$config['app_salt'])/2));
    }

    public static function checkHash($toCheck, $hash, $salt = '')
    {
        return hash('sha256', self::$config['app_salt'] . $salt . $toCheck . substr(self::$config['app_salt'] . $salt, 0, strlen(self::$config['app_salt'])/2)) === $hash;
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