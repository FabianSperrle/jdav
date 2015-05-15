<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <h1><?= $page->title() ?></h1>
        <ul>
            <?php foreach($page->children()->visible() as $lager): ?>
                <li><a href="<?= $lager->url() ?>"><?= $lager->title() ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php snippet('footer') ?>
