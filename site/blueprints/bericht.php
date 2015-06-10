<?php if(!defined('KIRBY')) exit ?>

title: Ausflugsbericht
pages: false
files:
  sortable: true
  fields:
    info:
      label: Titel
      type: text
    copy:
      label: Fotograf / Copyright
      type: text
fields:
  info:
    type: info
    text: >
      Bitte fülle **alle** Felder aus, bevor du deinen Bericht speicherst. 
      


      Du kannst beliebig viele Bilder hochladen (bitte in ausreichender Auflösung und Qualität, die Website kann automatische kleinere Versionen erstellen, wenn nötig). Nach einem Klick auf 'Dateien' kannst du diese auch mit drag & drop umsortieren.
      Über 'Bearbeiten' kannst du jedem Bild dann auch einen Titel geben und den Fotografen angeben.
  title:
    label: Title
    type:  text
    required: true
  text:
    label: Text
    type:  markdown
    size:  large
    required: true
  gruppe:
    label: Jugendgruppe
    type: select
    options: query
    query: 
      page: jugendgruppen
      fetch: children
      value: '{{title}}'
      text: '{{title}}'
  year:
    label: Jahr des Events
    type: number
    width: 1/2
    required: true
  titelbild:
    label: Titelbild
    type: select
    options: images
    required: true
