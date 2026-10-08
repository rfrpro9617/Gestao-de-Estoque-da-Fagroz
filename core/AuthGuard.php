<?php

namespace Core;

final class AuthGuard implements Middleware
{
  public function handle(): void
  {
    if (!Auth::check()) {
      header('Location: ' . BASE_URL . '/');
      exit;
    }
  }
}
