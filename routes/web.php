<?php

use Core\Router;
use Core\AuthGuard;

use App\Back\Controllers\AuthController;
use App\Back\Controllers\HomeController;
use App\Back\Controllers\UserController;
use App\Back\Controllers\AtendimentoController;

$router = new Router();

// Públicas
$router->get('/', [AuthController::class, 'index']);
$router->post('/login', [AuthController::class, 'login']);

// Protegidas
$router->post(
  '/logout',
  [AuthController::class, 'logout'],
  [AuthGuard::class]
);

$router->get(
  '/inicio',
  [HomeController::class, 'index'],
  [AuthGuard::class]
);

$router->get(
  '/usuarios',
  [UserController::class, 'index'],
  [AuthGuard::class]
);

$router->get(
  '/usuarios/{id}',
  [UserController::class, 'show'],
  [AuthGuard::class]
);

$router->get(
  '/atendimentos',
  [AtendimentoController::class, 'index'],
  [AuthGuard::class]
);

$router->dispatch(
  $_SERVER['REQUEST_METHOD'],
  $_SERVER['REQUEST_URI']
);
