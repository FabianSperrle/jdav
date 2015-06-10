<?php

kirby()->routes(array(
    array(
        'pattern' => 'content/intern/(:all)',
        'action' => function($path) {
            $dirs = str::split($path, '/');
            $filename = array_pop($dirs);

            $parent = site()->children()->findBy('dirname', 'intern');
            foreach ($dirs as $dir) {
                if ($child = $parent->children()->findBy('dirname', $dir)) {
                    $parent = $child;
                } else {
                    // Directory doesn't exist
                    header::notFound();
                    return site()->visit('error');
                }
            }

            if ($file = $parent->file($filename)) {
                if($user = site()->user()) {
                    if ($user->hasPanelAccess()) {
                        $file->show();
                    } else {
                        header::forbidden();
                        return site()->visit('error/forbidden');
                    }
                } else {
                    header::status(401);
                    return site()->visit('error/unauthorized');
                }
            } else {
                // File doesn't exist
                header::notFound();
                return site()->visit('error');
            }
        }
    ))
);
