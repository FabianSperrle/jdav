<div class="structure<?php e($field->readonly(), ' structure-readonly') ?>" data-field="structure" data-page="<?php echo $field->page() ?>" data-sortable="<?php e($field->readonly(), 'false', 'true') ?>">
  <?php echo $field->headline() ?>

  <input type="hidden" name="<?php __($field->name()) ?>" value="<?php __(json_encode($field->value()), false) ?>">

  <script class="structure-entries-template" type="text/x-handlebars-template">

    {{#unless entries}}
    <div class="structure-empty">
      <?php _l('fields.structure.empty') ?> <a class="structure-add-button" href="#"><?php _l('fields.structure.add.first') ?></a>
    </div>
    {{/unless}}
<?php $color_key = a::first(array_keys($field->colors)); ?>
<?php $field->value = a::sort($field->value, 'status'); ?>
    <ul>
        <?php foreach($field->value as $entry): ?>
            <li style="background-color: #<?= $field->colors[$color_key][$entry[$color_key]] ?>"><?= $entry['vorname'] ?></li>
        <?php endforeach; ?>
    </ul>
  </script>
</div>
