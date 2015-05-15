<?php snippet('header') ?>

<?php
$berichte = $page->children()->visible()->groupBy('year');
a::show($berichte); exit;
foreach($berichte as $group): ?>
    <?php foreach($group as $bericht): ?>
        <p><?= $bericht->year() ?></p>
    <?php endforeach; ?>
<?php endforeach; ?>


<?php snippet('footer') ?>
