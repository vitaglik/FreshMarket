<?php

namespace core;
// /product/123
class Router
{
    private $routes = [];

    public function get(string $route, $controller)
    {
        $this->routes['GET'][$this->normalize($route)] = $controller;
    }

    public function post(string $route, $controller)
    {
        $this->routes['POST'][$this->normalize($route)] = $controller;
    }

    public function delete(string $route, $controller)
    {
        $this->routes['DELETE'][$this->normalize($route)] = $controller;
    }
    public function patch(string $route, $controller)
    {
        $this->routes['PATCH'][$this->normalize($route)] = $controller;
    }
    public function dispatch(string $uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $path = $this->normalize($path);

        if (!isset($this->routes[$method])) {
            die('404');
        }

        /**
         * Как выглядит роут
         * контроллер@метод(путь)
         */
        foreach ($this->routes[$method] as $route => $action) {

            $params = [];

            if (!$this->matchRoute($route, $path, $params)) {
                continue;
            }

            [$controller, $method] = explode('@', $action);

            if (!class_exists($controller)) {
                die('Controller not found: ' . $controller );
            }

            $newController = new $controller();

            if (!method_exists($newController, $method)) {
                die('Method not found: ' . $method);
            }

            $response = $newController->$method(...$params);

            if ($response !== null) {
                echo $response;
            }

            return;
        }
        http_response_code(404);
        die('Я тут - 404');

    }

    private function matchRoute(string $route, string $requestPath, array &$params): bool
    {
        $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
        $pattern = "#^" . $pattern . "$#";

        if (!preg_match($pattern, $requestPath, $matches)) {
            return false;
        }

        array_shift($matches);

        $params = $matches;

        return true;

    }



    private function normalize(string $route): string
    {
        if ($route !== '/') {
            $route = rtrim($route, '/'); // https://example.com/blog/post/1/ => https://example.com/blog/post/1
        }
        return $route;
    }
}
