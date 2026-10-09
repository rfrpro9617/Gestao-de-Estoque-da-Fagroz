<nav class="navbar border-b border-[#3b6854] bg-[#234d3c] px-4 text-[#f5f5e9] md:px-8" aria-label="Navegação principal">
  <div class="mx-auto flex w-full max-w-7xl flex-wrap justify-between gap-3">
    <div class="flex items-center gap-3">
      <a href="<?= BASE_URL ?>/" aria-label="Página inicial">
        <img class="h-16 w-20 rounded-md object-contain" src="<?= BASE_URL ?>/app/Front/Assets/images/logoninfaabelha.jpg" alt="NINFA">
      </a>
      <a href="https://www.ufrgs.br/fagroz/" aria-label="FAGROZ - UFRGS">
        <img class="h-16 w-28 object-contain brightness-0 invert" src="<?= BASE_URL ?>/app/Front/Assets/images/logo_fagroz.png" alt="FAGROZ">
      </a>
    </div>
    <button class="btn btn-ghost md:hidden" type="button" data-collapse-toggle="main-navigation" aria-controls="main-navigation" aria-expanded="false">
      Menu
    </button>
    <div class="hidden w-full md:block md:w-auto" id="main-navigation">
      <ul class="menu menu-vertical gap-1 p-0 md:menu-horizontal md:items-center">
        <li><a href="<?= BASE_URL ?>/inicio">Início</a></li>
        <li><a href="https://www.ufrgs.br/fagroz/ninfa.php?action=login">Central de Atendimentos</a></li>
        <!-- TODO: adicionar link para Sistema de Estoques -->
        <li><a href="#">Sistema de Estoques</a></li>
        <li>
          <form action="<?= BASE_URL ?>/logout" method="post">
            <button type="submit">Sair</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>