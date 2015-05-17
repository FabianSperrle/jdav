<div class="row">
    <div class="small-12 columns">
        <hr class="divider">
    </div>
</div>
<?php
$posts = $page->children()->visible()->flip()->filterBy('date', '<=', time())->paginate(6);
$pagination = $posts->pagination();
foreach ($posts as $post): ?>
<div class="row entry">
    <div class="small-12 large-9 columns">
        <div class="row">
            <?php if ($post->images()->count() > 0): ?>
            <div class="small-8 columns">
                <?php else: ?>
                <div class="small-12 columns">
                    <?php endif; ?>
                    <h4><a href="<?= $post->url() ?>" alt="<?= $post->title() ?>"><?= $post->title() ?></a></h4>
                </div>
                <div class="small-4 columns meta">
                    <div class="right"><?= date('d.m.Y', $post->date()) ?></div>
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns"><?= $post->text()->excerpt(400) ?></div>
            </div>
            <div class="row">
                <div class="small-8 columns links">
                    <a href="<?= $post->url() ?>">Weiterlesen</a>
                    <?php foreach ($post->links()->yaml() as $link): ?>
                        <a href="<?= $link['url'] ?>"><?= $link['text'] ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="small-4 columns text-right meta">[<?= $post->author() ?>]</div>
            </div>
            <div class="row">
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
    <div class="row">
        <div class="small-12 columns">
            <nav class="pagination">
                <?php if ($pagination->hasPrevPage()): ?>
                    <a href="<?php echo $pagination->prevPageUrl() ?>">neuere Einträge</a>
                <?php endif ?>

                <?php if ($pagination->hasNextPage()): ?>
                    <a href="<?php echo $pagination->nextPageUrl() ?>">ältere Einträge</a>
                <?php endif ?>
            </nav>
        </div>
    </div>
