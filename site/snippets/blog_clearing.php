<?php if($post->images()->count() > 0): ?>
    <div class="small-4 columns">
        <ul class="clearing-thumbs clearing-feature" data-clearing>
            <?php $i = 0; foreach($post->images() as $image): $i++ ?>
                <?php $thumb = thumb($image, array('width' => 260, 'height' => 260, 'crop' => true, 'upscale' => false)); ?>
                <?php if ($i == 1): ?>
                   <li class="clearing-featured-img"><a href="<?= $thumb->source()->url() ?>"><img src="<?= $thumb->url() ?>"></a></li>
                <?php else: ?>
                    <li><a href="<?= $thumb->source()->url() ?>"><img src="<?= $thumb->url() ?>"></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
