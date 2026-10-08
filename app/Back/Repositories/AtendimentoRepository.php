<?php

namespace App\Back\Repositories;

use App\Back\Models\Atendimento;
use Core\Database;

final class AtendimentoRepository
{
  public function findAll(): array
  {
    $stmt = Database::connection()->query(
      'SELECT codigo FROM atendimentos ORDER BY codigo DESC'
    );

    return array_map(
      fn(array $row) => new Atendimento((int) $row['codigo']),
      $stmt->fetchAll()
    );
  }
}
