<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= \App\Support\View::e($title ?? 'Manor') ?></title>
  <style>
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; margin: 0; }
    header, main { max-width: 960px; margin: 0 auto; padding: 16px; }
    header { border-bottom: 1px solid #e5e5e5; display: flex; gap: 16px; align-items: center; }
    nav a { margin-right: 12px; text-decoration: none; }
    .card { border: 1px solid #e5e5e5; border-radius: 10px; padding: 12px; }
    .stars { display: inline-flex; gap: 4px; align-items: center; }
    .star { border: none; background: transparent; cursor: pointer; font-size: 18px; padding: 0; line-height: 1; }
    .star:disabled { cursor: default; opacity: 0.9; }
    .star--empty { opacity: 0.25; }
    .star--half { opacity: 0.55; }
    .star--full { opacity: 0.95; }

  </style>
</head>
<body>
<header>
  <strong>Manor</strong>
  <nav>
    <a href="/">Home</a>
    <a href="/images">Images</a>
  </nav>
</header>

<main>
  <?= $content ?>
</main>
</body>
</html>
