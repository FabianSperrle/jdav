<?php if(!defined('KIRBY')) exit ?>

title: Interner Bereich
files: false
pages:
  template:
    - protokoll
    - abrechnung
    - hilfestellungen
    - lagerdinge
    - verschiedenes
fields:
  title:
    label: Titel
    type: text
  text:
    label: Info, wenn nicht eingeloggt
    type: markdown
    size: medium

