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
            // vérifie si la route demandée (basée sur la méthode HTTP et le chemin URI) 
            // existe dans le tableau des routes.

            $controllerClassName = $this->routes[$requestedMethod][$requestedPath][0];
            // récupère le nom de la classe du contrôleur pour la route donnée.

            $method = $this->routes[$requestedMethod][$requestedPath][1];
            // récupère le nom de la méthode à appeler sur ce contrôleur.

            $controller = new $controllerClassName();
            // crée une nouvelle instance du contrôleur.
            
            return call_user_func([$controller, $method]);
        } else {
            $this->redirectTo404();
        }
    }
    public function redirectTo404() {
        http_response_code(404);
        include __DIR__ . '/../views/error404.php';
    }
}
