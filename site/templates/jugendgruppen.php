<?php snippet('header') ?>

<div class="row">
    <div class="small-5 columns">
        <hr/>
    </div>
    <div class="small-2 columns"><h4>Radolfzell</h4></div>
    <div class="small-5 columns">
        <hr/>
    </div>
    <div class="small-12 columns">
        <ul class="small-block-grid-3">
            <?php foreach ($page->children()->visible()->filterBy('ort', '==', 'radolfzell')->sortBy('name', 'ASC') as $group): ?>
                <li>
                    <a href="<?= $group->url() ?>"><img
                            src="<?php echo thumb($group->images($group->bild()->text()), array('width' => 300, 'upscale' => true))->url() ?>"/></a>

                    <div class="text-center"><?= $group->name() ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="row">
    <div class="small-5 columns">
        <hr/>
    </div>
    <div class="small-2 columns"><h4>Konstanz</h4></div>
    <div class="small-5 columns">
        <hr/>
    </div>
    <div class="small-12 columns">
        <ul class="small-block-grid-3">
            <?php foreach ($page->children()->visible()->filterBy('ort', '==', 'konstanz')->sortBy('name', 'ASC') as $group): ?>
                <li>
                    <a href="<?= $group->url() ?>"><img
                            src="<?php echo thumb($group->images($group->bild()->text()), array('width' => 300, 'upscale' => true))->url() ?>"/></a>

                    <div class="text-center"><?= $group->name() ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="row">
    <div class="small-5 columns">
        <hr/>
    </div>
    <div class="small-2 columns"><h4>Singen</h4></div>
    <div class="small-5 columns">
        <hr/>
    </div>
    <div class="small-12 columns">
        <ul class="small-block-grid-3">
            <?php foreach ($page->children()->visible()->filterBy('ort', '==', 'singen')->sortBy('name', 'ASC') as $group): ?>
                <li>
                    <a href="<?= $group->url() ?>"><img
                            src="<?php echo thumb($group->images($group->bild()->text()), array('width' => 300, 'upscale' => true))->url() ?>"/></a>

                    <div class="text-center"><?= $group->name() ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php snippet('footer') ?>
