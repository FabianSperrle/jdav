<?php

$html = '<figure class="entry-gallery collage">';
$images = $page->images()->sortBy('sort', 'asc');
foreach ($images as $image) :
    if ($file = $page->images()->find((string) $image->filename())) :
        $thumb = thumb($file, array('width' => 290));
        $html .= '<img src="' . $thumb->url() . '" width="' . $thumb->width() . '" height="' . $thumb->height() . '" data-width="' . $thumb->width() . '" data-height="' . $thumb->height() . '" alt="' . $file->caption() . '">';
    endif;
endforeach;
$html .= '</figure>';

echo $html;

