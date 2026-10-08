<nav class="navbar border-b border-base-300 bg-base-100 px-4 md:px-8" aria-label="Navegação principal">
  <div class="mx-auto flex w-full max-w-7xl flex-wrap justify-between gap-3">
    <a href="<?= BASE_URL ?>/inicio" class="flex items-center gap-3 font-['Manrope'] text-sm font-bold text-base-content" data-tour="brand">
      <span class="grid h-9 w-9 place-items-center rounded-md bg-success text-success-content">M</span>
      <span><?= htmlspecialchars(APP_NAME) ?></span>
    </a>

    <button class="btn btn-ghost md:hidden" type="button" data-collapse-toggle="main-navigation" aria-controls="main-navigation" aria-expanded="false">
      Menu
    </button>

    <div class="hidden w-full md:block md:w-auto" id="main-navigation">
      <ul class="menu menu-vertical gap-1 p-0 md:menu-horizontal md:items-center">
        <li><a href="<?= BASE_URL ?>/inicio" data-tour="home-link">Início</a></li>
        <li><a href="<?= BASE_URL ?>/atendimentos" data-tour="attendance-link">Atendimentos</a></li>
        <li><a href="<?= BASE_URL ?>/usuarios" data-tour="users-link">Usuários</a></li>
        <li>
          <button class="btn btn-ghost btn-sm" type="button" data-start-tour aria-label="Iniciar tour guiado">
            Tour guiado
          </button>
        </li>
        <li>
          <form action="<?= BASE_URL ?>/logout" method="post">
            <button class="btn btn-ghost btn-sm" type="submit">Sair</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>