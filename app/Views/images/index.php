<?php declare(strict_types=1); ?>
<h1>Images</h1>

<?php if (empty($images ?? [])): ?>
  <p>No images yet.</p>
<?php else: ?>
  <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:12px;">
    <?php foreach ($images as $img): ?>
      <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <strong><?= \App\Support\View::e($img['title']) ?></strong>
          <small><?= \App\Support\View::e((string)$img['avg']) ?></small>
        </div>

        <div style="margin-top:8px;">
          <?= \App\Support\View::partial('partials.stars', [
              'value' => $img['avg'],
              'readonly' => true,
          ]) ?>
        </div>

        <div style="margin-top:10px;">
          <small>Your rating:</small><br>
          <?= \App\Support\View::partial('partials.stars', [
              'value' => $img['user_rating'] ?? 0,
              'readonly' => false,
              'imageId' => $img['id'],
          ]) ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
