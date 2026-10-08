<?php
$atendimentos = $atendimentos ?? [];
$codigoCounts = [];
$gridRows = [];
foreach ($atendimentos as $atendimento) {
  $codigo = (string) $atendimento->codigo;
  $codigoCounts[$codigo] = ($codigoCounts[$codigo] ?? 0) + 1;
  $gridRows[] = [$codigo];
}
?>
<section class="space-y-6">
  <header class="flex flex-col gap-3 border-b border-base-300 pb-6 sm:flex-row sm:items-end sm:justify-between" data-tour="page-heading">
    <div>
      <p class="text-xs font-bold uppercase tracking-[0.14em] text-success">OPERAÇÃO</p>
      <h1 class="mt-2 font-['Manrope'] text-3xl font-bold">Atendimentos</h1>
      <p class="mt-2 text-sm text-base-content/60">Distribuição por código e registros cadastrados.</p>
    </div>
    <a class="btn btn-sm btn-outline" href="<?= BASE_URL ?>/inicio">Voltar ao início</a>
  </header>

  <div class="grid gap-6 lg:grid-cols-[minmax(0,0.8fr)_minmax(0,1.2fr)]">
    <section class="card rounded-lg border border-base-300 bg-base-100 shadow-sm" aria-labelledby="attendance-chart-heading">
      <div class="card-body">
        <div>
          <h2 class="card-title font-['Manrope']" id="attendance-chart-heading">Por código</h2>
          <p class="text-sm text-base-content/60">Quantidade de registros em cada código.</p>
        </div>
        <?php if ($codigoCounts === []): ?>
          <div class="alert mt-4 text-sm">Nenhum dado disponível para exibir.</div>
        <?php else: ?>
          <div class="relative mt-4 h-64"><canvas id="attendance-chart" aria-label="Gráfico de atendimentos por código"></canvas></div>
        <?php endif; ?>
      </div>
    </section>

    <section class="card min-w-0 rounded-lg border border-base-300 bg-base-100 shadow-sm" aria-labelledby="attendance-table-heading" data-tour="data-table">
      <div class="card-body min-w-0">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
          <div>
            <h2 class="card-title font-['Manrope']" id="attendance-table-heading">Registros</h2>
            <div class="stat px-0 py-1">
              <div class="stat-title text-xs">Registros encontrados</div>
              <div class="stat-value text-2xl"><?= count($atendimentos) ?></div>
            </div>
          </div>
          <label class="form-control w-full sm:max-w-64">
            <span class="label py-1"><span class="label-text text-xs font-semibold">Filtrar por código</span></span>
            <select id="attendance-code-filter" class="select select-bordered w-full" autocomplete="off">
              <option value="">Todos os códigos</option>
              <?php foreach (array_keys($codigoCounts) as $codigo): ?>
                <option value="<?= htmlspecialchars($codigo) ?>">Código <?= htmlspecialchars($codigo) ?></option>
              <?php endforeach; ?>
            </select>
          </label>
        </div>
        <div id="attendance-grid" class="mt-4" aria-live="polite"></div>
        <script type="application/json" id="attendance-data">
          <?= json_encode($gridRows, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>
        </script>
        <script type="application/json" id="attendance-chart-data">
          <?= json_encode(['labels' => array_keys($codigoCounts), 'values' => array_values($codigoCounts)], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>
        </script>
      </div>
    </section>
  </div>
</section>