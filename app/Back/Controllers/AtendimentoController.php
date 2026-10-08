<?php

namespace App\Back\Controllers;

use App\Back\Services\AtendimentoService;
use Core\Controller;

final class AtendimentoController extends Controller
{
  public function __construct(private AtendimentoService $service = new AtendimentoService()) {}

  public function index(): void
  {
    $this->view('atendimentos/index', [
      'title' => 'Atendimentos',
      'atendimentos' => $this->service->listAtendimentos(),
    ]);
  }
}
