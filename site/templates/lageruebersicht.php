<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <h1><?= $page->ueberschrift() ?></h1>

        <p> Zu den Bildergalerien der vergangenen Lagern und Veranstaltungen gehts <a
                href="<?= page('bilder-und-berichte')->url() ?>">hier</a>. Hier stehen nur die Veranstaltungen der
            gesamten JDAV Konstanz, Ausflüge einzelner Gruppen erfährst du bei
            den Gruppenleitern! </p>
    </div>
</div>
<?php foreach ($page->children()->visible()->filter(function ($l) {
    if ($l->anmeldung_start() == "") {
        return true;
    } else {
        if (strtotime($l->anmeldung_start()) <= time()) {
            if ($l->anmeldung_ende() == "" or strtotime($l->anmeldung_ende()) >= time()) {
                return true;
            }
            return false;
        }
    }
    return false;
}) as $lager): ?>
    <div class="row">
        <div class="small-4 medium-2 columns"><img
                src="<?= thumb($lager->images()->first(), array('width' => 160))->url() ?>"/></div>
        <div class="small-8 medium-10 columns">
            <div class="meta">
                <?= date('d.m.Y', strtotime($lager->start())) ?>
                <?php if ($lager->ende() != "") echo " - " . date('d.m.Y', strtotime($lager->ende())) ?>
                <h3><a href="<?= $lager->url() ?>"><?= $lager->title() ?></a></h3></div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <hr/>
        </div>
    </div>
<?php endforeach; ?>

<?php snippet('footer') ?>
