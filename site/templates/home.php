<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="row">
        <div class="small-12 columns">
            <h2><?php echo $page->title()->html() ?></h2>
            <?php echo $page->text()->kirbytext() ?>
        </div>
    </div>

    <?php snippet('blog') ?>

  </main>

<?php snippet('footer') ?>
