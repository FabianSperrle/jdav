<?php

$site = site();
$user = $site->user();

if (!$user->hasRole('jugendleiter')) {
    return false;
}

return array('title' => "Deine Jugendgruppe",
    'html' => function () {
        $j = page('jugendleiter');
        return "coole gruppe";
    }
);
