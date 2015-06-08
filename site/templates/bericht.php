<?php snippet('header') ?>

<?php go() ?>

<div class="row">
    <div class="small-12 columns">
        <h1><?= $page->title() ?></h1>
        <?= $page->text()->kirbytext() ?>
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
        <?php snippet('gallery') ?>
    </div>
</div>

<div class="row">
    <div class="small-6 columns">
        <?php if($page->hasPrevVisible()): ?>
            &#8592; Vorheriger Bericht: <a href="<?= $page->prevVisible()->url() ?>"><?= $page->prevVisible()->title() ?></a>
        <?php endif; ?>
    </div>
    <div class="small-6 columns text-right">
        <?php if($page->hasNextVisible()): ?>
            Nächster Bericht: <a href="<?= $page->nextVisible()->url() ?>"><?= $page->nextVisible()->title() ?></a> &#8594;
        <?php endif; ?>
    </div>
</div>

<?php snippet('footer') ?>
