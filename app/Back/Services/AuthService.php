<?php

namespace App\Back\Services;

use App\Back\Models\User;
use App\Back\Repositories\UserRepository;

final class AuthService
{
  public function __construct(private UserRepository $repository = new UserRepository()) {}

  public function authenticate(string $email, string $password): ?User
  {
    $user = $this->repository->findByEmail($email);

    if ($user === null || !$user->verifiesPassword($password)) {
      return null;
    }

    return $user;
  }
}
