<nav role="navigation">

    <div class="row navigation">
      <div class="small-7 large-4 columns">
        <?php foreach($site->pages()->visible() as $page): ?>
            <a href="<?= $page->url() ?>" alt="<?= $page->title() ?>"><div class="panel"><?= $page->title() ?></div></a>
        <?php endforeach; ?>
      </div>
      <div class="small-5 large-3 large-offset-5 columns">
        <img class="right" src="http://placehold.it/200x69/JDAV" />
      </div>
    </div>
</nav>
