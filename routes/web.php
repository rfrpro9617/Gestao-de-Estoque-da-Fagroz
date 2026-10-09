<?php

use Core\Router;
use Core\AuthGuard;

use App\Back\Controllers\AuthController;
use App\Back\Controllers\StockController;

$router = new Router();

// Publics
$router->get('/', [AuthController::class, 'index']);
$router->post('/login', [AuthController::class, 'login']);

// Protected
$router->post(
  '/logout',
  [AuthController::class, 'logout'],
  [AuthGuard::class]
);

$router->get(
  '/estoque',
  [StockController::class, 'index'],
  [AuthGuard::class]
);

$router->get(
  '/estoque/{section}',
  [StockController::class, 'index'],
  [AuthGuard::class]
);

$router->dispatch(
  $_SERVER['REQUEST_METHOD'],
  $_SERVER['REQUEST_URI']
);
