<?php

// Automatically add all new youth leaders to the yaml field.
kirby()->hook('panel.user.create', function($user) {
    if (!$user->hasRole('jugendleiter')) return;

    $site = site();
    $page = $site->page('jugendleiter');

    try {
        $jugendleiter = $page->jugendleiter()->yaml();
        $data = array(
            'name' => $user->userName(),
            'gruppe' => '',
            'funktion' => '',
        );
        $jugendleiter[] = $data;
        $page->update(array(
            'jugendleiter' => yaml::encode($jugendleiter),
        ));
        return response::success('The user has been updated');
    } catch(Exception $e) {
        return response::error($e->getMessage());
    }
});
