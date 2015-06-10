<div class="structure<?php e($field->readonly(), ' structure-readonly') ?>" data-field="structure" data-page="<?php echo $field->page() ?>" data-sortable="<?php e($field->readonly(), 'false', 'true') ?>">
  <?php echo $field->headline() ?>

  <input type="hidden" name="<?php __($field->name()) ?>" value="<?php __(json_encode($field->value()), false) ?>">

  <script class="structure-entries-template" type="text/x-handlebars-template">

    {{#unless entries}}
    <div class="structure-empty">
      <?php _l('fields.structure.empty') ?> <a class="structure-add-button" href="#"><?php _l('fields.structure.add.first') ?></a>
    </div>
    {{/unless}}

    <table class="colorstruct"><thead><tr>
    <th>Ändern</th>
    <th>Name</th>
    <th>Vorname</th>
    <th>Vegetarier</th>
    <th>Sonstiges</th>
    <th>Geld</th>
    <th>Zettel</th>
    <th>Status</th>
    </tr></thead><tbody>
    {{#entries}}
        <tr style="background-color: {{farbe}}" data-structure-id="{{_id}}" id="structure-entry-{{_id}}">
            <td class='center'><button type="button" data-structure-id="{{_id}}" class="btn btn-with-icon structure-edit-button"> <?php i('pencil', 'left') ?></button><button type="button" data-structure-id="{{_id}}" class="btn btn-with-icon structure-delete-button"> <?php i('remove', 'right') ?></button></td>
            <?php echo $field->entry() ?>{{fab}}
        </tr>
    {{/entries}}
    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="center">{{vegetarier}} / {{entries.length}}</td><td></td><td class="center">{{bezahlt}} / {{entries.length}}</td><td class="center">{{unterschrieben}} / {{entries.length}}</td><td></td></tr>
    </tbody></table>
  </script>
</div>
