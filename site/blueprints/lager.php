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
  preis:
    type: number
    label: Preis
    width: 1/2
  jlpreis:
    type: number
    label: Preis für Anwärter
    width: 1/2
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
  p:
    type: headline
    label: Geld & Einverständniserklärungen
  einv-adresse:
    type: textarea
    size: medium
    label: Adresse, an die die Einverständniserklärung geschickt werden soll
  kto:
    type: text
    label: Kontoeigentümer
    width: 1/2
  bank:
    type: text
    label: Kreditinstitut
    width: 1/2
  bic:
    type: text
    label: BIC
    width: 1/2
  iban: 
    type: text
    label: IBAN
    width: 1/2
  g:
    type: headline
    label: Gadget
  gadget:
    label: Gibt es ein Geschenk für die Teilnehmer?
    type: toggle
    text: yes/no
  gadget-name:
    label: Gadget-Name
    type: text
    width: 1/2
  gadget-sizes:
    label: Verfügbare Größen, kommasepariert
    type: tags
    width: 1/2
  t:
    type: headline
    label: Teilnehmer
  teilnehmer:
    label: Teilnehmerliste
    type: colorstruct
    help: Bitte denke daran, alle Änderungen auch zu speichern!
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
        width: 1/2
      typ:
        label: Typ
        type: select
        options:
          j: Jugendleiter
          t: Teilnehmer
          a: Anwärter
        width: 1/2
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
      sonstiges:
        label: Sonstiges
        type: textarea
        size: medium
      gruppe:
        label: Jugendgruppe
        type: select
        options: query
        query: 
          page: jugendgruppen
          fetch: visibleChildren
          value: '{{title}}'
          text: '{{title}}'
