<?php snippet('header') ?>

<div class="row">
    <div class="small-12 columns">
        <ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">
            <?php $juleis = $page->jugendleiter()->yaml();
            usort($juleis, function ($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
            foreach($juleis as $jugendleiter):
                $julei = $site->user($jugendleiter['name']); ?>
                <li>
                    <?php if($avatar = $julei->avatar()): ?>
                        <img src="<?= $avatar->url() ?>" alt="<?= $julei->firstName() . ' ' . $julei->lastName() ?>">
                        <?php else: ?>
                        <img src="<?= $site->url() ?>/assets/avatars/default.jpg" alt="<?= $julei->firstName() . ' ' . $julei->lastName() ?>">
                    <?php endif; ?>
                    <div class="text-center"> <?= $julei->firstName() ?> <?= $julei->lastName() ?> </div>
                    <?php if ($jugendleiter['gruppe'] != ""): ?><div class="text-center">(<?= $jugendleiter['gruppe'] ?>)</div><?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php snippet('footer') ?>
