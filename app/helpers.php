<?php

use App\Helpers\Session;

$container['session'] = function() {
    return new Session();
};