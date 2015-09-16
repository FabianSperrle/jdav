<?php if(!defined('KIRBY')) exit ?>

title: Blogpost
pages: false
files:
  sortable: true
  fields:
    caption:
      label: Beschreibung
      type: text
    foto:
      label: Fotograf / Copyright
      type: text
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  markdown
  info:
    label: Bilder
    type: info
    text: >
      Auf der linken Seite kannst du Bilder hochladen. Bitte stelle sicher, dass für jeden Artikel **mindestens ein** Foto existiert.
      Die Fotos können per drag and drop sortiert werden. Das erste Bild sollte im **Querformat** sein, um unschöne Beschnitt-Effekte zu vermeiden.
  links:
    label: Links
    type: structure
    entry: >
      {{text}} --> ({{url}})
    fields:
      url:
        label: URL
        type: text
      text:
        label: Linktext
        type: text
  date:
    label: Veröffentlichungsdatum
    type: date
    width: 1/2
    default: today
  author:
    label: Autor
    type: user
    width: 1/2
