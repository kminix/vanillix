<?php
declare(strict_types=1);

/**
 * Expected variables:
 * - $value (float|int)   Current rating (avg or user rating)
 * - $max (int)           Typically 5
 * - $readonly (bool)     If true, no click behavior
 * - $imageId (int|null)  Needed for clickable mode
 */

$value    = $value ?? 0;
$max      = $max ?? 5;
$readonly = $readonly ?? true;
$imageId  = $imageId ?? null;

$filled = (int) floor((float)$value);
$half   = ((float)$value - $filled) >= 0.5;
?>
<span class="stars"
      data-readonly="<?= $readonly ? '1' : '0' ?>"
      data-image-id="<?= $imageId !== null ? (int)$imageId : '' ?>">
  <?php for ($i = 1; $i <= $max; $i++): ?>
    <?php
      $state = 'empty';
      if ($i <= $filled) {
          $state = 'full';
      } elseif ($i === $filled + 1 && $half) {
          $state = 'half';
      }
    ?>
    <button
      type="button"
      class="star star--<?= $state ?>"
      <?= $readonly ? 'disabled' : '' ?>
      data-star="<?= $i ?>"
      aria-label="Rate <?= $i ?> star<?= $i === 1 ? '' : 's' ?>"
      title="<?= $i ?> star<?= $i === 1 ? '' : 's' ?>"
    >★</button>
  <?php endfor; ?>
</span>
