<nav role="navigation"
     style="background: url('<?= $site->images()->shuffle()->first()->url() ?>'); background-size: cover;">
    <div class="row navigation">
        <div class="small-7 medium-4 large-3 columns">
            <?php foreach ($site->pages()->visible() as $page): ?>
                <a href="<?= $page->url() ?>" alt="<?= $page->title() ?>">
                    <div
                        class="panel <?php if ($page->isActive() or $page->isOpen()): ?> active <?php endif; ?>"><?= $page->title() ?></div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="small-5 large-3 large-offset-5 columns">
            <img class="right" src="<?= $site->url() ?>/assets/img/logo/logo.svg"/>
        </div>
    </div>
</nav>
