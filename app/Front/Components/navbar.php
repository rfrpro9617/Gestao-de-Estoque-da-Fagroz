<?php

use Core\Auth;

$userName = trim((string) (Auth::user()?->name ?? ''));
?>
<nav class="navbar border-b border-[#3b6854] bg-[#234d3c] px-4 text-[#f5f5e9] shadow-sm md:px-8" aria-label="Navegação principal">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden" aria-label="Abrir menu">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </div>
      <ul tabindex="-1" class="menu menu-sm dropdown-content z-1 mt-3 w-52 rounded-box bg-[#234d3c] p-2 shadow">
        <li><a href="<?= BASE_URL ?>/inicio">Início</a></li>
        <li>
          <details>
            <summary>NINFA</summary>
            <ul class="p-2">
              <li><a href="https://www.ufrgs.br/fagroz/ninfa.php?action=login">Central de Atendimentos</a></li>
            </ul>
          </details>
        </li>
        <li>
          <details>
            <summary>RH</summary>
            <ul class="p-2">
              <!-- TODO: adicionar link para Sistema de Estoques -->
              <li><a href="#">Sistema de Estoques</a></li>
            </ul>
          </details>
        </li>
        <li>
          <form action="<?= BASE_URL ?>/logout" method="post">
            <button type="submit">Sair</button>
          </form>
        </li>
      </ul>
    </div>
    <div class="flex items-center gap-3">
      <a href="<?= BASE_URL ?>/" aria-label="Página inicial">
        <img class="h-16 w-20 rounded-md object-contain" src="<?= BASE_URL ?>/app/Front/Assets/images/logoninfaabelha.jpg" alt="NINFA">
      </a>
      <a href="https://www.ufrgs.br/fagroz/" aria-label="FAGROZ - UFRGS">
        <img class="h-16 w-28 object-contain brightness-0 invert" src="<?= BASE_URL ?>/app/Front/Assets/images/logo_fagroz.png" alt="FAGROZ">
      </a>
    </div>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="<?= BASE_URL ?>/inicio">Início</a></li>
      <li>
        <details>
          <summary>NINFA</summary>
          <ul class="z-1 w-52 rounded-box bg-[#234d3c] p-2 shadow">
            <li><a href="https://www.ufrgs.br/fagroz/ninfa.php?action=login">Central de Atendimentos</a></li>
          </ul>
        </details>
      </li>
      <li>
        <details>
          <summary>RH</summary>
          <ul class="z-1 w-52 rounded-box bg-[#234d3c] p-2 shadow">
            <!-- TODO: adicionar link para Sistema de Estoques -->
            <li><a href="#">Sistema de Estoques</a></li>
          </ul>
        </details>
      </li>
      <li>
        <form action="<?= BASE_URL ?>/logout" method="post">
          <button type="submit">Sair</button>
        </form>
      </li>
    </ul>
  </div>
  <div class="navbar-end">
    <span>Olá<?= $userName !== '' ? ', ' . htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') : '' ?></span>
  </div>
</nav>