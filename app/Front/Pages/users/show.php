<?php $title = 'Usuário'; ?>
<section class="mx-auto max-w-3xl space-y-6">
  <header class="flex items-end justify-between border-b border-base-300 pb-6" data-tour="page-heading">
    <div>
      <p class="text-xs font-bold uppercase tracking-[0.14em] text-success">CADASTROS</p>
      <h1 class="mt-2 font-['Manrope'] text-3xl font-bold">Perfil do usuário</h1>
    </div>
    <a class="btn btn-sm btn-outline" href="<?= BASE_URL ?>/usuarios">Voltar à lista</a>
  </header>

  <article class="card rounded-lg border border-base-300 bg-base-100 shadow-sm" data-tour="user-profile">
    <div class="card-body">
      <div class="flex items-center gap-4 border-b border-base-200 pb-5">
        <div class="avatar placeholder">
          <div class="w-14 rounded-full bg-success text-success-content"><span class="font-['Manrope'] text-xl font-bold"><?= htmlspecialchars(strtoupper(substr($user->name, 0, 1))) ?></span></div>
        </div>
        <div>
          <h2 class="font-['Manrope'] text-xl font-bold"><?= htmlspecialchars($user->name) ?></h2>
          <p class="text-sm text-base-content/60">Usuário #<?= (int) $user->id ?></p>
        </div>
      </div>
      <dl class="grid gap-4 pt-2 sm:grid-cols-2">
        <div>
          <dt class="text-xs font-semibold uppercase tracking-wide text-base-content/50">Nome</dt>
          <dd class="mt-1 text-sm font-medium"><?= htmlspecialchars($user->name) ?></dd>
        </div>
        <div>
          <dt class="text-xs font-semibold uppercase tracking-wide text-base-content/50">E-mail</dt>
          <dd class="mt-1 break-all text-sm font-medium"><?= htmlspecialchars($user->email) ?></dd>
        </div>
      </dl>
    </div>
  </article>
</section>