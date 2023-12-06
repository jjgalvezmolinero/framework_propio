<?php

namespace Course\Test;

use Course\HttpMethod;
use Course\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase {
    public function test_resolve_basic_route_with_callback_action() {
        $uri = '/test';
        $action = fn() => "test";
        $router = new Router();
        $router->get($uri, $action);
        
        $this->assertEquals($action, $router->resolve($uri, HttpMethod::GET->value));
    }

    public function test_resolve_multiple_basic_routes_with_callback_action() {
        $routes = [
            '/test' => fn () => "test",
            '/foo' => fn () => "foo",
            '/bar' => fn () => "bar",
            '/long/nested/route' => fn () => "long nested route",
        ];
        $router = new Router();
        foreach($routes as $uri=>$action) {
            $router->get($uri, $action);
        }
        foreach($routes as $uri=>$action) {
            $this->assertEquals($action, $router->resolve($uri, HttpMethod::GET->value));
        }
    }
}