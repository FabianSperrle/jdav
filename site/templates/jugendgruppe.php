<?php snippet('header') ?>

<div class="row gruppe">
    <div class="small-12 columns">
        <h4><?= $page->title() ?><h4>
    </div>
    <div class="small-12 medium-6 columns">
        <div class="row">
            <div class="small-12 columns">
                <?php
                    $image;
                    if (!$page->bild()->isEmpty()) {
                        $image = $page->images($page->bild());
                    } else {
                        $image = $page->parent()->images('nophoto.jpg');
                    } ?>
                <img src="<?= thumb($image, array('width' => 500, 'upscale' => true))->url() ?>"/>
            </div>
            <div class="small-12 columns">
                <h3>Jugendleiter</h3>
                <ul class="small-block-grid-2 medium-block-grid-3">
                    <?php foreach (yaml($page->jugendleiter()) as $jugendleiter): ?>
                        <li>
                            <?php if ($img = $site->user($jugendleiter['name'])->avatar()): ?>
                                <img src="<?= $img->url() ?>">
                            <?php else: ?>
                                <img src="<?= $site->url() ?>/assets/avatars/default.jpg"/>
                            <?php endif; ?>
                            <p><?= $site->user($jugendleiter['name'])->firstName() ?> <?= $site->user($jugendleiter['name'])->lastName() ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="small-12 medium-6 columns">
        <div><?= $page->beschreibung() ?></div>
        <?php if ($page->jahrgang() != ""): ?>
            <div class="details"><b>Jahrgang:</b> <?= $page->jahrgang() ?></div>
        <?php endif; ?>
        <?php if ($page->zeit() != ""): ?>
            <div class="details"><b>Zeit:</b> <?= $page->zeit() ?></div>
        <?php endif; ?>
        <?php if ($page->treffpunkt() != ""): ?>
            <div class="details"><b>Treffpunkt:</b> <?= $page->treffpunkt() ?></div>
        <?php endif;

        $reports = page('bilder-und-berichte')->children()->visible()->filterBy('gruppe', (string) $page->title());
        if ($reports->count() > 0): ?>
            <div class="details">
                <b>Berichte und Gallerien mit Ausflügen der <?= $page->title() ?></b>
                <ul>
                    <?php foreach($reports as $report): ?>
                        <li><a href="<?= $report->url() ?>" alt="<?= $report->title() ?>"><?= $report->title() ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php snippet('footer') ?>
