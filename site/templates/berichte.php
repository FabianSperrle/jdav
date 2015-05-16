<?php snippet('header') ?>

<?php

$collection = $page->children()->visible();
$years = $collection->pluck('year', null, true); ?>

<?php foreach ($years as $year): ?>
    <div class="row">
        <div class="small-12 columns">
            <h3><?= (string)$year ?></h3>
            <?php $reports = $collection->filterBy('year', (string)$year)->flip(); ?>
            <ul class="small-block-grid-4">
                <?php foreach ($reports as $report): ?>
                    <li><a href="<?= $report->url() ?>">
                        <div>
                            <img src="<?= thumb($report->images((string) $report->titelbild()), array('height' => 152, 'upscale' => false, ))->url() ?>"/>
                        </div>
                        <p class="text-center"><?= $report->title() ?></p></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endforeach; ?>

<?php snippet('footer') ?>
