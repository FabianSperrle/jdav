<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <?php if ($user = $site->user() and ($user->hasRole('admin') or $user->hasRole('jugendleiter'))): ?>
            <?php foreach($page->mitglieder()->toStructure() as $person): ?>
                <?= $person->name() ?>
            <?php endforeach; ?>
        <?php else: ?>
            here's your form...
        <?php endif; ?>
    </div>
</div>

<?php snippet('footer') ?>
