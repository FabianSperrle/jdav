<?php snippet('header') ?>

<?php $locations = ['Radolfzell', 'Konstanz', 'Singen'];
foreach ($locations as $location): ?>
    <div class="row">
        <div class="small-5 columns">
            <hr/>
        </div>
        <div class="small-2 columns"><h4><?= $location ?></h4></div>
        <div class="small-5 columns">
            <hr/>
        </div>
        <div class="small-12 columns">
            <ul class="small-block-grid-3">
                <?php foreach ($page->children()->visible()->filterBy('ort', '==', strtolower($location))->sortBy('name', 'ASC') as $group): ?>
                    <li>
                        <?php 
                        $image;
                        if (!$group->bild()->isEmpty()) {
                            $image = $group->images($group->bild());
                        } else {
                            $image = $page->images('nophoto.jpg');
                        } ?>
                        <a href="<?= $group->url() ?>"><img
                                src="<?php echo thumb($image, array('width' => 300, 'upscale' => true))->url() ?>"/></a>

                        <div class="text-center"><?= $group->title() ?></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endforeach; ?>

<?php snippet('footer') ?>
