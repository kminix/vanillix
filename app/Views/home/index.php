<?php declare(strict_types=1); ?>
<div class="card">
  <h1><?= \App\Support\View::e($heading ?? 'Home') ?></h1>
  <p><?= \App\Support\View::e($message ?? 'Welcome.') ?></p>
</div>
