<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <h1><?= $page->ueberschrift() ?></h1>

        <p> Zu den Bildergalerien der vergangenen Lagern und Veranstaltungen gehts <a
                href="<?= page('bilder-und-berichte')->url() ?>">hier</a>. Hier stehen nur die Veranstaltungen der gesamten JDAV Konstanz, Ausflüge einzelner Gruppen erfährst du bei
            den Gruppenleitern! </p>
    </div>
</div>
<?php foreach ($page->children()->visible() as $lager): ?>
    <div class="row">
        <div class="small-2 columns"><img src="<?= thumb($lager->images()->first(), array('width' => 160))->url() ?>" /></div>
        <div class="small-4 columns">
            <div><?= $lager->start() ?> - <?= $lager->ende() ?></div>
            <div><h2><a href="<?= $lager->url() ?>"><?= $lager->title() ?></a></h2></div>
        </div>
        <div class="small-2 columns">Anmeldung</div>
    </div>
    <div class="row">
        <div class="small-12 columns">
           <hr />
        </div>
    </div>
<?php endforeach; ?>

<?php snippet('footer') ?>
