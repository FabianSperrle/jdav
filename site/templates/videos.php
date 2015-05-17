<?php snippet('header') ?>
<div class="row">
    <div class="small-12 columns">
        <h1>Videos</h1>
    </div>
</div>

<?php foreach($page->children()->visible() as $video): ?>
    <div class="row">
        <div class="small-12 medium-7 columns">
            <h3><a href="<?= $video->url() ?>"><?= $video->title() ?></a></h3>
            <?= $video->beschreibung()->kirbytext() ?>
        </div>
        <div class="small-12 medium-5 columns">
            <?php if (str::contains((string) $video->video_url(), 'youtube')) {
                echo youtube((string) $video->video_url());
            } else {
                echo vimeo((string) $video->video_url());
            } ?>
        </div>
    </div>
<?php endforeach ?>

<?php snippet('footer') ?>
