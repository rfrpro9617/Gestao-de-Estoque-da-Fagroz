<?php
namespace App\Back\DTOs;

final class UserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(trim((string)($data['name'] ?? '')), trim((string)($data['email'] ?? '')));
    }
}
