<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <?= $page->text()->kirbytext() ?>
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
        <?php snippet('gallery') ?>
    </div>
</div>

<?php snippet('footer') ?>
