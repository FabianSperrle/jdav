<?php if(!defined('KIRBY')) exit ?>

title: Lager / Ausflug
pages: false
fields:
  title:
    label: Titel
    type: text
  beschreibung:
    label: Beschreibung
    type: markdown
  start:
    label: Startdatum
    type: date
  ende:
    label: Enddatum
    type: date
  anmeldung_start:
    label: Start der Anmeldung
    type: date
  anmeldung_ende:
    label: Ende der Anmeldung
    type: date
  plaetze:
    label: Anzahl der Plätze
    type: number
  jugendleiter:
    label: Jugendleiter
    type: structure
    entry: >
      Username: {{name}}
    fields:
      name:
        label: Username
        type: user
  teilnehmer:
    label: Teilnehmer
    type: structure
    entry: >
      {{vorname}} {{nachname}}<br />
    fields:
      vorname:
        label: Vorname
        type: text
        width: 1/2
      nachname:
        label: Nachname
        type: text
        width: 1/2
      status:
        label: Status
        type: select
        options:
          angemeldet: Angemeldet
          bezahlt: Bezahlt
          einv: Einverständniserklärung unterschrieben
          komplett: Bezahlt & unterschrieben
          liste: Auf der Warteliste
      strasse:
        label: Straße
        type: text
        width: 3/4
      hausnummer:
        label: Hausnummer
        type: text
        width: 1/4
      plz:
        label: PLZ
        type: number
        width: 1/4
      ort:
        label: Wohnort
        type: text
        width: 3/4
      telefon:
        label: Telefon
        type: text
      handy:
        label: Handy der Eltern
        type: text
      geb:
        label: Geburtstag
        type: date
      email:
        label: Email
        type: email
      veggie:
        label: Vegetarier
        type: select
        options:
          ja: Ja
          nein: Nein
      gruppe:
        label: Jugendgruppe
        type: select
        options: query
        query: 
          page: jugendgruppen
          fetch: visibleChildren
          value: '{{name}}'
          text: '{{name}}'
  status:
    type: select
    label: Status
    options:
      ja: findet statt
      nein: abgesagt
      vorbei: vorbei
    default: ja
