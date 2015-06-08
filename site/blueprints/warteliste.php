<?php if (!defined('KIRBY')) exit ?>

title: Warteliste
pages: false
files: false
fields:
  info:
    type: info
    label: Info
    text: >
      Dies ist die *Rohversion* der Warteliste, die das System benötigt, um die Daten zu speichern. Eine (hoffentlich) besser
      nutzbare Version (link: /intern/warteliste text: findet ihr hier). Die Daten sind die gleichen, wo ihr Änderungen
      durchführt ist also egal.
  title:
    label: Titel
    type: text
    default: Warteliste
    override: true
    readonly: true
  mitglieder:
    label: Einträge auf der Warteliste
    type: structure
    fields:
      name:
        type: text
        label: Name
      email:
        type: email
        label: Email
      geb:
        type: date
        label: Geburtstag
      bemerkung:
        type: textarea
        size: small
        label: Bemerkungen
    entry: >
      <b>{{name}} ({{geb}})</b> <br />
      {{email}} <br />
      <span style="color:grey">{{bemerkung}}</span>
