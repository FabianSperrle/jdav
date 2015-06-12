<?php snippet('header') ?>

<?php

$collection = $page->children()->visible()->sortBy('year', 'DESC');
$years = $collection->pluck('year', null, true);
?>

<?php foreach ($years as $year): ?>
    <div class="row">
        <div class="small-5 columns"><hr /></div>
        <div class="small-2 columns"><h4 class="text-center"><?= $year ?></h4></div>
        <div class="small-5 columns"><hr /></div>
        <div class="small-12 columns">
            <?php $reports = $collection->filterBy('year', (string) $year)->flip(); ?>
            <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
                <?php foreach ($reports as $report): ?>
                    <?php 
                    $image;
                    if ($report->titelbild() != "")
                        $image = $report->images()->find((string)$report->titelbild());
                    else if ($report->hasImages())
                        $image = $report->images()->first();
                    else
                        continue;
                    ?>
                    <li><a href="<?= $report->url() ?>">
                            <div>
                                <img
                                    src="<?= thumb($image, array('height' => 150, 'width' => 227, 'crop' => true))->url() ?>"/>
                            </div>
                            <p class="text-center"><?= $report->title() ?></p></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endforeach; ?>

<?php snippet('footer') ?>
