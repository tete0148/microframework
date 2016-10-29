<?php

$app->get('/', c('Home::index'));
$app->get('/users', c('Users'));
$app->get('/register', c('Users::create'));