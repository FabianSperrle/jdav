<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns"><h4><?= $page->name() ?><h4></div> 
    <div class="small-6 columns">
        <div class="row">
            <div class="small-12 columns">
                <img src="<?= thumb($page->images($page->bild()), array('width' => 500, 'upscale' => true))->url() ?>" />
            </div>
            <div class="small-12 columns">
                <ul class="small-block-grid-3">
                    <?php foreach(yaml($page->jugendleiter()) as $jugendleiter): ?>
                        <li><img src="<?= $site->user($jugendleiter['name'])->avatar()->url() ?>"><p><?= $site->user($jugendleiter['name'])->firstName() ?> <?= $site->user($jugendleiter['name'])->lastName() ?></p></li>
                    <?php endforeach; ?>
                </ul> 
            </div>
        </div>
    </div>
    <div class="small-6 columns"> BLa BLA BLA BLA</div>
</div>

<?php snippet('footer') ?>
