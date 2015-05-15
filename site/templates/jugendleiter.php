<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <ul class="small-block-grid-4">
            <?php foreach ($site->users()->filterBy('role', '==', 'jugendleiter') as $julei): ?>
                <li>
                    <?php if($avatar = $julei->avatar()): ?>
                        <img src="<?= $avatar->url() ?>" alt="<?= $julei->firstName() . ' ' . $julei->lastName() ?>">
                    <?php endif; ?>
                    <p><?= $julei->firstName() ?> <?= $julei->lastName() ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php snippet('footer') ?>
