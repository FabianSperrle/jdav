<?php if($post->images()->count() > 0): ?>
    <div class="small-12 large-3 columns center">
        <ul class="clearing-thumbs clearing-feature" data-clearing>
            <?php $i = 0; foreach($post->images()->sortBy('sort', 'ASC') as $image): $i++ ?>
                <?php $thumb = thumb($image, array('width' => 300, 'height' => 200, 'crop' => true, 'upscale' => false)); ?>
                <li
                <?php if ($i == 1): ?>
                   class="clearing-featured-img"
                <?php endif; ?>
                    <?php $caption = "";
                if ($image->caption() != "") {
                    $caption = $image->caption();
                    if ($image->foto() != "") {
                        $caption .= " | &copy; " . $image->foto();
                    }
                } else if ($image->foto() != "") {
                    $caption = "&copy; " . $image->foto();
                } ?>
                ><a href="<?= $thumb->source()->url() ?>"><img data-caption="<?= $caption ?>" class="th" src="<?= $thumb->url() ?>"></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
