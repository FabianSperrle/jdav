<?php snippet('header') ?>
<?php $user = $site->user(); ?>

<?php if ($user != null and ($user->hasRole('jugendleiter') or $user->hasRole('admin'))): ?>
    <div class="row">
        <div class="small-12 columns">
            <h1>Willkommen im internen Bereich</h1>
            Du bist jetzt im Internen Bereich der JDAV Konstanz Homepage gelandet.
            Hier kannst du Dokumente und Vorlagen zur Abrechnung, Planung, etc... herunterladen. Wenn du Änderungen an
            der Website oder an den Infos über deine Jugendgruppe vornehmen möchtest, melde dich bitte im <a
                href="<?= $site->url() ?>/panel">Panel</a> an.

            <h3>Dokumente</h3>
            Hier könnt ihr nun alle wichtigen Dokumente für Planung, Abrechnung, etc... herunterladen. Falls ihr Fehler
            endeckt, oder euch etwas fehlt, meldet euch bitte bei Arne.
            <table width="100%">
                <thead>
                <tr>
                    <th width="600">Titel</th>
                    <th width="150">Word</th>
                    <th width="150">PDF</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($page->children()->visible()->filterBy('template', 'dokument')->sortBy('title', 'ASC') as $document): ?>
                    <?php
                    $doc = $document->documents()->filter(function ($f) {
                        return str::contains($f->extension(), 'doc') or str::contains($f->extension(), 'xls');
                    })->first();
                    $pdf = $document->documents()->filterBy('extension', 'pdf')->first();
                    ?>
                    <tr>
                        <td><?= $document->title() ?></td>
                        <td>
                            <?php if ($doc == null): ?>
                                -
                            <?php else: ?>
                                <a href="<?= $doc->url() ?>">Doc (<?= $doc->niceSize() ?>)</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($pdf == null): ?>
                                -
                            <?php else: ?>
                                <a href="<?= $pdf->url() ?>">PDF (<?= $pdf->niceSize() ?>)</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
                </tbody>
            </table>

            <h3>Protokolle</h3>
            <table width="100%">
                <thead>
                <tr>
                    <th width="600">Titel</th>
                    <th width="150">Datum</th>
                    <th width="150">PDF</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($page->children()->visible()->filterBy('template', 'protokoll')->sortBy('datum', 'DESC') as $document): ?>
                    <?php
                    $pdf = $document->documents()->filterBy('extension', 'pdf')->first();
                    ?>
                    <tr>
                        <td><?= $document->title() ?></td>
                        <td><?= date('d.m.Y', strtotime($document->datum()->string())) ?></td>
                        <td>
                            <?php if ($pdf == null): ?>
                                -
                            <?php else: ?>
                                <a href="<?= $pdf->url() ?>">PDF (<?= $pdf->niceSize() ?>)</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="small-12 columns">
            <h1><?= $page->title() ?></h1>
            <?= $page->text()->kirbytext() ?>
        </div>
    </div>
<?php endif; ?>

<?php snippet('footer') ?>
