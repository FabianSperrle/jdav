<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <h1><?= $page->title() ?></h1>
        <?= $page->text()->kirbytext() ?>
    </div>
    <?php snippet('gallery') ?>
    <div class="small-12 columns meta">
        Geschrieben am <?= date('d.m.Y', $page->date()) ?> von <?= $page->author() ?>
    </div>
</div>

<?php snippet('footer') ?>
