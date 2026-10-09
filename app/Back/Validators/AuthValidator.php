<?php

namespace App\Back\Validators;

final class AuthValidator
{
  /**
   * @return array{email: string, password: string}|null
   */
  public function validateLogin(array $input): ?array
  {
    $email = filter_var(trim($input['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $input['password'] ?? '';

    if ($email === false || !is_string($password) || $password === '') {
      return null;
    }

    return [
      'email' => $email,
      'password' => $password,
    ];
  }
}
