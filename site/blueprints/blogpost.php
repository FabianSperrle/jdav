<?php if(!defined('KIRBY')) exit ?>

title: Blogpost
pages: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
    size:  large
  links:
    label: Links
    type: structure
    entry: >
      {{text}} ({{page}})
    fields:
      page:
        label: Seite
        type: select
        options: pages
      text:
        label: Linktext
        type: text
  date:
    label: Veröffentlichungsdatum
    type: date
    width: 1/2
  author:
    label: Autor
    type: user
    width: 1/2
