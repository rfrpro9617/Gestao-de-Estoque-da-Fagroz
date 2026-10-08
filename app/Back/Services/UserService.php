<?php
namespace App\Back\Services;

use App\Back\Models\User;
use App\Back\Repositories\UserRepository;

final class UserService
{
    public function __construct(private UserRepository $repository = new UserRepository()) {}

    public function listUsers(): array { return $this->repository->findAll(); }

    public function getUser(int $id): ?User
    {
        return $this->repository->findById($id);
    }
}
