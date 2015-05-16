<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <h1><?= $page->ueberschrift() ?></h1>

        <p> Zu den Bildergalerien der vergangenen Lagern und Veranstaltungen gehts <a
                href="<?= page('bilder-und-berichte')->url() ?>">hier</a>.</p>

        <p>Hier stehen nur die Veranstaltungen der gesamten JDAV Konstanz, Ausflüge einzelner Gruppen erfährst du bei
            den Gruppenleitern! </p>
    </div>
</div>
<?php foreach ($page->children()->visible() as $lager): ?>
    <div class="row">
        <div class="small-1 columns">gr</div>
        <div class="small-4 columns"><a href="<?= $lager->url() ?>"><?= $lager->title() ?></a></div>
        <div class="small-4 columns"><?= $lager->start() ?> - <?= $lager->ende() ?></div>
        <div class="small-3 columns">Anmeldung</div>
    </div>
<?php endforeach; ?>

<?php snippet('footer') ?>
