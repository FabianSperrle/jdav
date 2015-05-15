<?php if(!defined('KIRBY')) exit ?>

title: Ausflugsbericht
pages: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  markdown
    size:  large
  year:
    label: Jahr des Ausflugs
    type: text
    width: 1/2
  titelbild:
    label: Titelbild
    type: select
    options: images
