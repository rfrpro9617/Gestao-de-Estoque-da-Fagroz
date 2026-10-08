<?php

namespace Core;

final class View
{
  public static function render(string $view, array $data = [], string $layout = 'app'): void
  {
    extract($data, EXTR_SKIP);
    $viewFile = __DIR__ . '/../app/Front/Pages/' . $view . '.php';
    $layoutFile = __DIR__ . '/../app/Front/Layouts/' . $layout . '.php';

    ob_start();
    require $viewFile;
    $content = ob_get_clean();
    require $layoutFile;
  }
}
