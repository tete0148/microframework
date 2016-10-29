<?php

$container['dao.users'] = function() use ($getPDO) {
    return new UserDAO($getPDO());
};