<?php if(!defined('KIRBY')) exit ?>

title: Jugendleiter
pages: false
fields:
  title:
    label: Titel
    type: text
  jugendleiter:
    label: Jugendleiter
    type: structure
    entry: >
      Username: {{name}}<br />
      Gruppe: {{gruppe}}
    fields:
      name:
        label: Username
        type: user
      gruppe:
        label: Gruppe
        type: select
        options: query
        query: 
          page: jugendgruppen
          fetch: visibleChildren
          value: '{{name}}'
          text: '{{name}}'
