<?php

namespace Blmundo\PhpMvcCustomCreation\Core;

class Router {
    protected $routes = [];

    public function addRoute($method, $path, $callback) {
        $this->routes[$method][$path] = $callback;
    }

    public function getResponse() {
        $requestedMethod = $_SERVER['REQUEST_METHOD'];
        $requestedPath = $_SERVER['REQUEST_URI'];

        // Gestion des paramètres d'URL
        $requestedPath = explode('?', $requestedPath)[0];

        if (isset($this->routes[$requestedMethod][$requestedPath])) {
            var_dump($this->routes[$requestedMethod][$requestedPath]);
            return call_user_func($this->routes[$requestedMethod][$requestedPath]);
        } else {
            // Gestion de l'erreur 404
            http_response_code(404);
            return "404 - Page not found";
        }
    }
}
