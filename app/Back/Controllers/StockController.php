<?php

namespace App\Back\Controllers;

use Core\Controller;

final class StockController extends Controller
{
  private const NAVIGATION = [
    'Operação' => [
      'dashboard' => ['label' => 'Dashboard', 'icon' => 'layout-dashboard'],
      'estoque' => ['label' => 'Estoque', 'icon' => 'boxes'],
      'distribuido-aos-setores' => ['label' => 'Distribuído aos Setores', 'icon' => 'landmark'],
      'movimentacoes' => ['label' => 'Movimentações', 'icon' => 'arrow-left-right'],
    ],
    'Compras' => [
      'pedidos' => ['label' => 'Pedidos', 'icon' => 'shopping-cart'],
      'gastos' => ['label' => 'Gastos', 'icon' => 'badge-dollar-sign'],
    ],
    'Cadastros' => [
      'materiais' => ['label' => 'Materiais', 'icon' => 'package'],
      'categorias' => ['label' => 'Categorias', 'icon' => 'tags'],
      'setores' => ['label' => 'Setores', 'icon' => 'building-2'],
      'fornecedores' => ['label' => 'Fornecedores', 'icon' => 'truck'],
      'unidades' => ['label' => 'Unidades', 'icon' => 'ruler'],
    ],
  ];

  public function index(string $section = 'dashboard'): void
  {
    foreach (self::NAVIGATION as $group => $items) {
      foreach ($items as $slug => $item) {
        $navigationGroups[$group] ??= [];
        $navigationGroups[$group][] = [
          ...$item,
          'slug' => $slug,
          'href' => $slug === 'dashboard'
            ? BASE_URL . '/estoque'
            : BASE_URL . '/estoque/' . $slug,
        ];
        if ($slug === $section) {
          $selectedSection = $item;
        }
      }
    }

    if (!isset($selectedSection)) {
      http_response_code(404);
      echo '404 - Página não encontrada';
      return;
    }

    $this->view(
      'stock/index',
      [
        'title' => $selectedSection['label'] . ' | Sistema de Estoque',
        'activeSection' => $section,
        'navigationGroups' => $navigationGroups ?? [],
        'section' => $selectedSection,
      ],
      'inventory'
    );
  }
}
