<?php

return function($site, $pages, $page) {
    if ($page->date() > time()) {
        exit;
    }
    return;
};
