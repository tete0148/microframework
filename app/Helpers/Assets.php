<?php

namespace App\Helpers;

class Assets
{
    private static $assetsRoot = '';

    public static function get($asset)
    {
        return self::$assetsRoot . '/' . $asset;
    }

    public static function setAssetsRoot($assetsRoot)
    {
        self::$assetsRoot = $assetsRoot;
    }

}