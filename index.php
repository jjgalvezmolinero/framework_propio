<?php
require './Router.php';
$router = new Router();

$router->get('/test', function() {
    return "GET-Hola que tal";
});

$router->post('/test', function() {
    return "POST-Hola que tal";
});

try {
    $action = $router->resolve();
    print($action());
} catch(HttpNotFoundException $e) {
    print("Not found");
    http_response_code(404);
}