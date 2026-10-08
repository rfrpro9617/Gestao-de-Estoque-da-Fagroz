<?php

namespace App\Back\Repositories;

use App\Back\Models\User;
use Core\Database;
use Core\UserProvider;

final class UserRepository implements UserProvider
{
  public function findAll(): array
  {
    $stmt = Database::connection()->query('SELECT id, name, email FROM users ORDER BY id DESC');
    return array_map(fn(array $row) => new User((int)$row['id'], $row['name'], $row['email']), $stmt->fetchAll());
  }

  public function findById(int $id): ?User
  {
    $stmt = Database::connection()->prepare(
      'SELECT
      chavePrimaria,
      NomeUsu,
      UserName,
      SenhaUsu,
      EmailUsu
     FROM programa
     WHERE chavePrimaria = :id
       AND UserName <> \'0\'
       AND SenhaUsu <> \'0\'
       AND VinculoUsu IN (\'Funcionário\', \'Professor\')
     LIMIT 1'
    );

    $stmt->execute(['id' => $id]);

    $row = $stmt->fetch();

    return $row
      ? new User(
        (int) $row['chavePrimaria'],
        (string) $row['NomeUsu'],
        (string) $row['EmailUsu'],
        (string) $row['UserName'],
        (string) $row['SenhaUsu']
      )
      : null;
  }

  public function findByEmail(string $email): ?User
  {
    $stmt = Database::connection()->prepare(
      'SELECT 
        chavePrimaria,
        NomeUsu,
        UserName,
        SenhaUsu,
        EmailUsu
       FROM programa
       WHERE EmailUsu = :email
         AND UserName <> \'0\'
         AND SenhaUsu <> \'0\'
         AND VinculoUsu IN (\'Funcionário\', \'Professor\')
       ORDER BY PriviUsu DESC
       LIMIT 1'
    );
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch();
    return $row
      ? new User(
        (int) $row['chavePrimaria'],
        (string) $row['NomeUsu'],
        (string) $row['EmailUsu'],
        (string) $row['UserName'],
        (string) $row['SenhaUsu']
      )
      : null;
  }
}
