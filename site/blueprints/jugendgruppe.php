<?php if(!defined('KIRBY')) exit ?>

title: Jugendgruppe
pages: false
fields:
  title:
    label: Gruppenname
    type: text
    required: true
  beschreibung:
    label: Beschreibungstext
    type: markdown
    size: medium
    required: true
  bild:
    label: Bild
    type: select
    options: images
  jahrgang:
    label: Jahrgänge
    type: text
  treffpunkt:
    label: Treffpunkt- und Anreise
    type: textarea
    size: small
  zeit:
    label: Gruppenzeit
    type: text
  ort:
    label: Ortsgruppe
    type: select
    options: 
      radolfzell: Radolfzell
      konstanz: Konstanz
      singen: Singen
    required: true
  jugendleiter:
    label: Jugendleiter
    type: structure
    entry: >
      {{name}}<br />
    fields:
      name:
        label: Username
        type: userrole
        role: jugendleiter
