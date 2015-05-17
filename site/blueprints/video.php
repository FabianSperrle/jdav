<?php if(!defined('KIRBY')) exit ?>

title: Video
pages: false
files: false
fields:
  title:
    label: Videotitel
    type: text
  beschreibung:
    label: Beschreibung
    type: markdown
    size: small
  video_url:
    label: Video-URL
    type: text
    help: Nur YouTube oder Vimeo!