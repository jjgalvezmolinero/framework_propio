<?php
require_once '../vendor/autoload.php';

use Course\HttpNotFoundException;
use Course\Router;

$router = new Router();

$router->get('/test', function() {
    return "GET-Hola que tal";
});

$router->post('/test', function() {
    return "POST-Hola que tal";
});
$router->put('/test', function () {
    return "PUT OK";
});
$router->patch('/test', function () {
    return "PATCH OK";
});
$router->delete('/test', function () {
    return "DELETE OK";
});

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];
    $action = $router->resolve($uri, $method);
    print($action());
} catch(HttpNotFoundException $e) {
    print("Not found");
    http_response_code(404);
}