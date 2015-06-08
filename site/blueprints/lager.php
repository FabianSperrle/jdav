<?php if(!defined('KIRBY')) exit ?>

title: Lager / Ausflug
pages: false
fields:
  basics:
    label: Basics
    type: headline
  title:
    label: Titel
    type: text
    required: true
  beschreibung:
    label: Beschreibung
    type: markdown
    required: true
  start:
    label: Startdatum
    type: date
    required: true
    width: 1/2
  ende:
    label: Enddatum
    type: date
    width: 1/2
  a:
    label: Organisatorisches
    type: headline
  b: 
    type: info
    text: >
      Hier kannst Du Start und Ende des Anmeldezeitraumes festlegen. Das Anmeldeformular wird dann automatisch (de)aktiviert. Trägst du nichts ein, ist die Anmeldung unbegrenzt und ab sofort offen. 
  anmeldung_start:
    label: Start der Anmeldung
    type: date
    width: 1/2
  anmeldung_ende:
    label: Ende der Anmeldung
    type: date
    width: 1/2
  plaetze:
    label: Anzahl der Plätze
    type: number
    width: 1/4
  jlplaetze:
    label: Plätze für Jugendleiter
    type: number
    width: 1/4
  status:
    type: select
    label: Status
    options:
      ja: findet statt
      nein: abgesagt
      vorbei: vorbei
    default: ja
    width: 1/2
  j:
    type: headline
    label: Jugendleiter
  jugendleiter:
    label: Liste der Jugendleiter
    type: structure
    entry: >
      Username: {{name}}
    fields:
      name:
        label: Username
        type: user
  t:
    type: headline
    label: Teilnehmer
  teilnehmer:
    label: Teilnehmerliste
    type: colorstruct
    entry: >
      {{vorname}} {{nachname}}<br>
    sort: 
      status:
        - komplett
        - bezahlt
        - einv
    colors:
      status:
        einv: 444
        bezahlt: BAC
        komplett: 592019
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
