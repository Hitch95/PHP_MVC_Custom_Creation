<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Blmundo\PhpMvcCustomCreation\Core\Router;
use Blmundo\PhpMvcCustomCreation\Controllers\HomeController;
use Blmundo\PhpMvcCustomCreation\Controllers\RandomNumberController;
use Blmundo\PhpMvcCustomCreation\Controllers\EvenNumbersController;


$router = new Router();

// Définir les routes
$router->addRoute('GET', '/', [HomeController::class, 'index']);

$router->addRoute('GET', '/random-number', [RandomNumberController::class, 'show']);

$router->addRoute('GET', '/even-numbers', [EvenNumbersController::class, 'index']);
$router->addRoute('POST', '/even-numbers', [EvenNumbersController::class, 'checkEven']);

// Exécution du routeur
echo $router->getResponse();
