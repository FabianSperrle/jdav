<?php 
$posts = $page->children()->visible()->flip()->filterBy('date', '<=', time())->paginate(10); 
$pagination = $posts->pagination();
foreach ($posts as $post): ?>
    <div class="row entry">
        <div class="small-9 columns">
            <div class="row">
                <?php if($post->images()->count() > 0): ?>
                    <div class="small-8 columns">
                <?php else: ?>
                    <div class="small-12 columns">
                <?php endif; ?>
                    <h4><a href="<?= $post->url() ?>" alt="<?= $post->title() ?>"><?= $post->title() ?></a></h4>
                </div>
                <div class="small-4 columns">
                    <div class="right"><?= $post->date() ?></div>
                </div>
            </div>
            <span><?= $post->text()->excerpt(400) ?></span>
            <span>[<?= $post->author() ?>]</span>
            <div>
                <?php foreach ($post->links()->yaml() as $link): ?>
                    <?php echo $site->pages()->title() ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php snippet('blog_clearing', array('post' => $post)) ?>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <hr class="divider">
        </div>
    </div>
<?php endforeach; ?> 
<nav class="pagination">
    <?php if($pagination->hasPrevPage()): ?>
        <a href="<?php echo $pagination->prevPageUrl() ?>">neuere Einträge</a>
    <?php endif ?>

    <?php if($pagination->hasNextPage()): ?>
        <a href="<?php echo $pagination->nextPageUrl() ?>">ältere Einträge</a>
    <?php endif ?>
</nav>
