<ul class="clearing-thumbs small-block-grid-5" data-clearing>
<?php $images = $page->images()->sortBy('sort', 'asc');
foreach ($images as $image) :
    if ($file = $page->images()->find((string) $image->filename())) :
        $thumb = thumb($file, array('width' => 290, 'height' => 290, 'crop' => true, 'upscale' => false)); ?>
        <li><a href="<?= $image->url() ?>"><img data-caption="<?= $image->caption() ?>" src="<?= $thumb->url() ?>" alt="<?= $file->caption() ?>"></a></li>
    <?php endif; ?>
<?php endforeach; ?>
</ul>
