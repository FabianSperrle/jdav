<?php
header::status(403);
snippet('header'); ?>

<div class="row">
    <div class="small-12 columns">
        <h1><?= $page->title() ?></h1>
        <p><?= $page->text()->kirbytext() ?></p>
    </div>
</div>

<?php snippet('footer'); ?>
