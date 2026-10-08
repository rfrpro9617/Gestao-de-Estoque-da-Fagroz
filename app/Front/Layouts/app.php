<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title ?? APP_NAME) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.24/dist/full.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/gridjs@6.2.0/dist/theme/mermaid.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/intro.js@8.3.2/minified/introjs.min.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-base-200 font-['DM_Sans'] text-base-content">
  <?php require __DIR__ . '/../Components/navbar.php'; ?>
  <main class="mx-auto max-w-7xl px-4 py-8 md:px-8" data-tour="content"><?= $content ?></main>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gridjs@6.2.0/dist/gridjs.umd.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/intro.js@8.3.2/minified/intro.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5"></script>
  <script src="<?= BASE_URL ?>/app/Front/Assets/js/app.js"></script>
</body>

</html>