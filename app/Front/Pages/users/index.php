<?php
$title = 'Usuários';
$users = $users ?? [];
$gridRows = [];
foreach ($users as $user) {
  $gridRows[] = [(int) $user->id, (string) $user->name, (string) $user->email];
}
?>
<section class="space-y-6">
  <header class="flex flex-col gap-3 border-b border-base-300 pb-6 sm:flex-row sm:items-end sm:justify-between" data-tour="page-heading">
    <div>
      <p class="text-xs font-bold uppercase tracking-[0.14em] text-success">CADASTROS</p>
      <h1 class="mt-2 font-['Manrope'] text-3xl font-bold">Usuários</h1>
      <p class="mt-2 text-sm text-base-content/60">Pesquise e consulte os usuários cadastrados.</p>
    </div>
    <a class="btn btn-sm btn-outline" href="<?= BASE_URL ?>/inicio">Voltar ao início</a>
  </header>

  <section class="card rounded-lg border border-base-300 bg-base-100 shadow-sm" aria-labelledby="users-table-heading" data-tour="data-table">
    <div class="card-body">
      <div class="flex flex-wrap items-center justify-between gap-3">
        <h2 class="card-title font-['Manrope']" id="users-table-heading">Diretório</h2>
        <span class="badge badge-outline"><?= count($users) ?> usuário(s)</span>
      </div>
      <div id="users-grid" class="mt-4" data-base-url="<?= htmlspecialchars(BASE_URL) ?>" aria-live="polite"></div>
      <script type="application/json" id="users-data">
        <?= json_encode($gridRows, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>
      </script>
    </div>
  </section>
</section>