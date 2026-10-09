<?php
$userName = trim((string) ($userName ?? ''));
?>
<section>
  <h1 class="font-['Manrope'] text-3xl font-bold">Seja bem-vindo<?= $userName !== '' ? ', ' . htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') : '' ?>!</h1>
</section>