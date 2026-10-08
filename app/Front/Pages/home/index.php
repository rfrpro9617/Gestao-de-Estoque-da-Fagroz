<section class="space-y-8">
  <header class="flex flex-col gap-3 border-b border-base-300 pb-6 sm:flex-row sm:items-end sm:justify-between" data-tour="page-heading">
    <div>
      <p class="text-xs font-bold uppercase tracking-[0.14em] text-success">PAINEL</p>
      <h1 class="mt-2 font-['Manrope'] text-3xl font-bold">Visão geral</h1>
      <p class="mt-2 text-sm text-base-content/60">Acesse as áreas disponíveis no sistema.</p>
    </div>
    <span class="badge badge-outline gap-2 px-3 py-3">
      <span class="h-2 w-2 rounded-full bg-success"></span>
      Ambiente interno
    </span>
  </header>

  <div class="grid gap-4 md:grid-cols-2" data-tour="quick-links">
    <a class="card rounded-lg border border-base-300 bg-base-100 shadow-sm transition hover:border-success/50 hover:shadow-md" href="<?= BASE_URL ?>/atendimentos">
      <div class="card-body">
        <span class="badge badge-success badge-outline w-fit">OPERAÇÃO</span>
        <h2 class="card-title mt-2 font-['Manrope']">Atendimentos</h2>
        <p class="text-sm text-base-content/60">Consulte os códigos e a distribuição dos atendimentos registrados.</p>
        <div class="card-actions mt-3 justify-end">
          <span class="btn btn-sm border-0 bg-[#285c48] text-white hover:bg-[#1f4c3b]">Abrir área <span aria-hidden="true">&rarr;</span></span>
        </div>
      </div>
    </a>

    <a class="card rounded-lg border border-base-300 bg-base-100 shadow-sm transition hover:border-success/50 hover:shadow-md" href="<?= BASE_URL ?>/usuarios">
      <div class="card-body">
        <span class="badge badge-info badge-outline w-fit">CADASTROS</span>
        <h2 class="card-title mt-2 font-['Manrope']">Usuários</h2>
        <p class="text-sm text-base-content/60">Pesquise e consulte os usuários cadastrados.</p>
        <div class="card-actions mt-3 justify-end">
          <span class="btn btn-sm border-0 bg-[#285c48] text-white hover:bg-[#1f4c3b]">Abrir área <span aria-hidden="true">&rarr;</span></span>
        </div>
      </div>
    </a>
  </div>
</section>