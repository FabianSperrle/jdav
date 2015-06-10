<?php

kirbytext::$pre[] = function($kirbytext, $value) {
    $page = $kirbytext->field->page;
    if (!$page->isDescendantOf(page('lager'))) return $value;

    $keys = array("{{Lagername}}", "{{Preis}}", "{{Anwaerterpreis}}", "{{Start}}", "{{Ende}}", "{{KtoEigentuemer}}", "{{BIC}}", "{{IBAN}}", "{{Adresse}}");

    $values = array();
    $values[] = $page->title();
    $values[] = $page->preis();
    $values[] = $page->jlpreis();
    $values[] = date('d.m.Y', strtotime($page->start()));
    $values[] = date('d.m.Y', strtotime($page->ende()));
    $values[] = $page->kto();
    $values[] = $page->bic();
    $values[] = $page->iban();
    $values[] = $page->einv_adresse();

    return str_replace($keys, $values, $value);
};
