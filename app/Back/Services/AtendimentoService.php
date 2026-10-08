<?php

namespace App\Back\Services;

use App\Back\Repositories\AtendimentoRepository;

final class AtendimentoService
{
  public function __construct(private AtendimentoRepository $repository = new AtendimentoRepository()) {}

  public function listAtendimentos(): array
  {
    return $this->repository->findAll();
  }
}
