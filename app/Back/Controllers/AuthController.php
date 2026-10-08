<?php

namespace App\Back\Controllers;

use App\Back\Services\AuthService;
use Core\Auth;
use Core\Controller;

final class AuthController extends Controller
{
  public function __construct(private AuthService $service = new AuthService()) {}

  public function index(): void
  {
    // If the user is already authenticated, redirect to the home page
    // Controll do not know how authentication works, so it uses the Auth class to check if the user is authenticated
    if (Auth::check()) {
      header('Location: ' . BASE_URL . '/inicio');
      exit;
    }
    $this->view('auth/login', ['title' => 'Entrar | ' . APP_NAME], 'auth');
  }

  public function login(): void
  {
    // Check if the email has a valid format
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if ($email === false || !is_string($password) || $password === '') {
      $this->showLoginError();
      return;
    }

    $user = $this->service->authenticate($email, $password);
    if ($user === null) {
      $this->showLoginError();
      return;
    }

    Auth::login($user);

    header('Location: ' . BASE_URL . '/inicio');
    exit;
  }

  public function logout(): void
  {
    Auth::logout();

    header('Location: ' . BASE_URL . '/');
    exit;
  }

  private function showLoginError(): void
  {
    $this->view(
      'auth/login',
      [
        'title' => 'Entrar | ' . APP_NAME,
        'feedback' => 'E-mail ou senha inválidos. Confira seus dados e tente novamente.',
      ],
      'auth'
    );
  }
}
