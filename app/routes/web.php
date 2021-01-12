<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return response()->json(['message' => 'Hello stranger!'], 200);
});

$router->get('/search', 'SearchController@search');
