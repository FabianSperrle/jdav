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
    if ((string) $page->anmeldung() == 'false') {
        return array('error' => true, 'message' => 'Die Anmeldung für dieses Lager ist nicht freigeschaltet!');
    }
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
        $neu['handy'] = get('handy');
        $neu['geb'] = get('geb');
        $neu['email'] = get('email');
        $neu['email2'] = get('email2');
        $neu['veggie'] = get('veggie');
        $neu['gruppe'] = get('gruppe');
        $neu['sonstiges'] = get('sonstiges');
        if ($wl = (count($page->teilnehmer()->yaml()) >= $page->plaetze()->int())) {
            $neu['status'] = "liste";
        } else {
            $neu['status'] = "angemeldet";
        }
        $neu['typ'] = 't';

        $teilnehmer = $page->teilnehmer()->yaml();
        $teilnehmer[] = $neu;
        try {
            $page->update(array('teilnehmer' => yaml::encode($teilnehmer)));
            if ($wl) return array('wl' => true);
            else return array('success' => true);
        } catch (Exception $e) {
            // Updating page failed
            return ['error' => true];
        }
    }

    return array('errors' => false);
};
