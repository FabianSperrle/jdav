<?php

/**
 * Takes some env. variables and returns an array of additional parameters for the template.
 *
 * @param Site $site
 * @param $pages
 * @param Page $page
 * @return array
 */
return function (Site $site, $pages, Page $page) {
    // handle the form submission
    if (r::is('post') and get('submit2a')) {
        // Get info from the POST variable
        $neu = array();
        $neu['vorname'] = get('vorname');
        $neu['nachname'] = get('name');
        $neu['geschlecht'] = get('geschlecht');
        $neu['strasse'] = get('strasse');
        $neu['hausnummer'] = get('hausnummer');
        $neu['plz'] = get('plz');
        $neu['ort'] = get('ort');
        $neu['telefon'] = get('tel');
        $neu['geb'] = get('geb');
        $neu['email'] = get('email');
        $neu['sonstiges'] = get('sonstiges');
        $neu['erfahrung'] = get('erfahrung');

        $teilnehmer = $page->mitglieder()->yaml();
        $teilnehmer[] = $neu;
        try {
            $page->update(array('mitglieder' => yaml::encode($teilnehmer)));
            return array('success' => true);
        } catch (Exception $e) {
            // Updating page failed
            return ['error' => true];
        }
    }
    return array();
};
