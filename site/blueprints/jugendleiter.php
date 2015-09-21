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
    width: 1/2
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
          fetch: children
          value: '{{title}}'
          text: '{{title}}'
      funktion:
        label: Funktion
        type: text
        help: z.B. Jugendreferent, Web-Design, ...
