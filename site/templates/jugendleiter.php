<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <ul class="small-block-grid-3 medium-block-grid-4 large-block-grid-5">
            <?php foreach($page->jugendleiter()->yaml() as $jugendleiter): ?>
                <?php $julei = $site->user($jugendleiter['name']); ?>
                <li>
                    <?php if($avatar = $julei->avatar()): ?>
                        <img src="<?= $avatar->url() ?>" alt="<?= $julei->firstName() . ' ' . $julei->lastName() ?>">
                        <?php else: ?>
                        <img src="<?= $site->url() ?>/assets/avatars/default.jpg" alt="<?= $julei->firstName() . ' ' . $julei->lastName() ?>">
                    <?php endif; ?>
                    <div class="text-center"> <?= $julei->firstName() ?> <?= $julei->lastName() ?> </div>
                    <div class="text-center">(<?= $jugendleiter['gruppe'] ?>)</div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php snippet('footer') ?>
