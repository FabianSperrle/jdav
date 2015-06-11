<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
    <meta name="description" content="<?php echo $site->description()->html() ?>">
    <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

    <?php echo css('assets/css/app.css') ?>
    <?php echo js('bower_components/modernizr/modernizr.js') ?>

</head>
<body>
<?php $footer = page('home')->images()->findBy('name', 'footer'); ?>
<body style="background-image: url('<?= thumb($footer, array('width' => 1920, 'quality' => 60))->url() ?>');">
    <?php snippet('menu') ?>
