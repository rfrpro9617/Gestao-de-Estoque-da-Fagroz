<?php

namespace App\Back\DTOs;

final class UserDTO
{
  public function __construct(
    public readonly int $id = 0,
    public readonly string $name = '',
    public readonly string $email = '',
    public readonly ?string $username = null,
    public readonly ?string $password = null,
  ) {}

  public static function fromArray(array $data): self
  {
    return new self(
      (int) ($data['id'] ?? $data['chavePrimaria'] ?? 0),
      trim((string) ($data['name'] ?? $data['NomeUsu'] ?? '')),
      trim((string) ($data['email'] ?? $data['EmailUsu'] ?? '')),
      array_key_exists('username', $data)
        ? trim((string) $data['username'])
        : (array_key_exists('UserName', $data) ? trim((string) $data['UserName']) : null),
      array_key_exists('password', $data)
        ? (string) $data['password']
        : (array_key_exists('SenhaUsu', $data) ? (string) $data['SenhaUsu'] : null),
    );
  }
}
