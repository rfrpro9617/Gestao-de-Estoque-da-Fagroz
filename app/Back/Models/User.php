<?php

namespace App\Back\Models;

final class User
{
  public function __construct(
    public readonly int $id,
    public readonly string $name,
    public readonly string $email,
    private readonly ?string $username = null,
    private readonly ?string $storedPassword = null,
  ) {}

  public function verifiesPassword(string $password): bool
  {
    if ($this->storedPassword === null || $this->username === null) {
      return false;
    }

    // Modern hashing algorithm (bcrypt, Argon2, etc.) check
    // Compare the provided password with the stored password using constant-time comparison to prevent timing attacks.
    if (password_verify($password, $this->storedPassword)) {
      return true;
    }

    // Legacy hashing algorithm (SHA-1, text-pure) check
    // Compare the provided password with the stored password using constant-time comparison to prevent timing attacks.
    if (hash_equals($this->storedPassword, $password)) {
      return true;
    }

    $usernameHash = sha1($this->username . $password);

    return preg_match('/\A[a-f0-9]{40}\z/i', $this->storedPassword) === 1
      && hash_equals(strtolower($this->storedPassword), $usernameHash);
  }
}
