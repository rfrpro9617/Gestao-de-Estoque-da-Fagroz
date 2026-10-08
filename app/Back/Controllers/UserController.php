<?php

namespace App\Back\Controllers;

use App\Back\Services\UserService;
use Core\Controller;

final class UserController extends Controller
{
  public function __construct(private UserService $service = new UserService()) {}

  public function index(): void
  {
    $this->view('users/index', ['users' => $this->service->listUsers()]);
  }

  public function show(string $id): void
  {
    $user = $this->service->getUser((int) $id);
    if ($user === null) {
      http_response_code(404);
      echo 'Usuário não encontrado.';
      return;
    }

    $this->view('users/show', ['user' => $user]);
  }
}
