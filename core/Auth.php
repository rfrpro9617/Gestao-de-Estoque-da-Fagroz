<?php

namespace Core;

final class Auth
{
  private static ?UserProvider $userProvider = null;

  public static function setUserProvider(UserProvider $userProvider): void
  {
    self::$userProvider = $userProvider;
  }

  public static function check(): bool
  {
    return isset($_SESSION['auth']);
  }

  public static function user(): ?object
  {
    if (!isset($_SESSION['auth']['user_id'])) {
      return null;
    }

    if (self::$userProvider === null) {
      throw new \LogicException(
        'O UserProvider não foi configurado.'
      );
    }

    return self::$userProvider->findById(
      (int) $_SESSION['auth']['user_id']
    );
  }

  public static function login(object $user): void
  {
    if (!session_regenerate_id(true)) {
      throw new \RuntimeException(
        'Não foi possível renovar a sessão após a autenticação.'
      );
    }

    $_SESSION['auth'] = [
      'user_id' => $user->id,
    ];
  }

  public static function logout(): void
  {
    unset($_SESSION['auth']);
  }
}
