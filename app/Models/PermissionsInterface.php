<?php


namespace App\Models;


interface PermissionsInterface
{
    /**
     * @param $permission string
     * @return boolean
     */
    public function hasPermission($permission);
}