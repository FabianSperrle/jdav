<?php if (!defined('KIRBY')) exit ?>

title: Warteliste
pages: false
files: false
fields:
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
      vorname:
        type: text
        label: Vorname
      nachname:
        type: text
        label: Name
      geb:
        type: date
        label: Geburtstag
      strasse:
        type: text
        label: Straße
        width: 3/4
      hausnummer:
        type: text
        label: Hausnummer
        width: 1/4
      plz: 
        type: number
        label: PLZ
        width: 1/4
      ort:
        type: text
        label: Wohnort
        width: 3/4
      email:
        type: email
        label: Email
      telefon:
        type: text
        label: Telefonnummer
      erfahrung:
        type: textarea
        size: small
        label: Kletterfahrung
      bemerkung:
        type: textarea
        size: small
        label: Bemerkungen
    entry: >
      <b>{{vorname}} {{nachname}} ({{geb}})</b> <br>
      {{email}} <br>
      Erfahrung: <p style="color:grey">{{erfahrung}}</p>
      Bemerkung: <p style="color:grey">{{bemerkung}}</p>
