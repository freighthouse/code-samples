<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php

  // Loop over the fields
  foreach ($fields as $id => $field) {

    // Get the current row number
    if (isset($field->handler->view->row_index)) {
      $current_row = $field->handler->view->row_index;
    }

    // If this is the title, store the value
    if ($field->class == 'field-bipac-camp-learn-more') {
      $node_id = $field->content;
    }

    if (isset($node_id)) {
      // Load the node
      $this_node = node_load($node_id);
      //krumo($this_node);

      // title
      $title = $this_node->title;
      // field-issue-summary
      $body = $this_node->field_issue_summary['und'][0]['safe_value'];
      // path
      $this_alias = $GLOBALS['base_url'] . '/' . drupal_get_path_alias('node/' . $node_id);
      // field-taxonomy-region
      $terms_array = $this_node->field_taxonomy_region['und'];
      // field-take-action-group
      $take_action_array = $this_node->field_take_action_group['und'];

      // Initialize the output variable
      $field_taxonomy_region = '';
      foreach ($terms_array as $delta => $item) {
        // If this is tid 1, we output US markup
        if ($item['tid'] == '1') {
          $field_taxonomy_region .= '<div class="issue-region-icon-us">USA</div>';
        }

        // If this is tid 6, we output global markup
        if ($item['tid'] == '6') {
          $field_taxonomy_region .= '<div class="issue-region-icon-global">Global</div>';
        }
      }

      // Initialize a trigger variable
      $take_action = '';

      // Get the size of the take action array
      $take_action_count = count($take_action_array);

      // Determine if this is one or more take action items
      if ($take_action_count == 1) {
        $single_item = ' single-item';
      }
      else {
        $single_item = '';
      }

      // Loop over the take action items
      foreach ($take_action_array as $delta => $take_action_item) {
        $item_id = $take_action_item['value'];
        $take_action = entity_load('field_collection_item', array($item_id));

        $rownum = $delta + 1;
        if ($rownum % 2 == 0) {
          $row_type = 'even';
        }
        else {
          $row_type = 'odd';
        }

        // Get the title
        if (isset($take_action[$item_id]->field_take_action_text['und'][0]['safe_value'])) {
          $take_action_title = $take_action[$item_id]->field_take_action_text['und'][0]['safe_value'];
        }
        else {
          $take_action_title = "";
        }

        // Get the icon
        if (isset($take_action[$item_id]->field_take_action_icon['und'][0]['value'])) {
          $take_action_icon = $take_action[$item_id]->field_take_action_icon['und'][0]['value'];
        }
        else {
          $take_action_icon = "";
        }

        // Get the url
        if (isset($take_action[$item_id]->field_take_action_link['und'][0]['url'])) {
          $take_action_url = $take_action[$item_id]->field_take_action_link['und'][0]['url'];
        }
        else {
          $take_action_url = "";
        }

        $take_action_items[$delta]['row_num'] = $delta;
        $take_action_items[$delta]['row_type'] = $row_type;
        $take_action_items[$delta]['take_action_title'] = $take_action_title;
        $take_action_items[$delta]['take_action_icon'] = $take_action_icon;
        $take_action_items[$delta]['take_action_url'] = $take_action_url;

      }

      // If this is the take action section, store the markup
      if ($take_action == '') {
        $take_action_class = 'no-take-action ';
      }
      else {
        $take_action_class = 'has-take-action ';
      }
    }

  }
?>

<div class="featured-issue-wrapper <?php print $take_action_class; ?>row-<?php print $current_row; ?>">
  <?php if(trim($this_alias) != '') : ?><a class="featured-issue-link" href="<?php print $this_alias; ?>"><?php endif; ?>
    <div class="featured-issue-title"><?php print render($title); ?></div>
    <div class="featured-issue-description"><?php print render($body); ?></div>
  <?php if(trim($this_alias) != '') : ?></a><?php endif; ?>
  <div class="featured-issue-region">
    <?php if(isset($field_taxonomy_region)): print render($field_taxonomy_region); endif; ?>
  </div>
</div>
<div class="featured-issue-take-action">
  <?php for($this_row = 0; $this_row < $take_action_count; $this_row++) { ?>
    <div class="take-action-group-wrapper<?php print $single_item; ?> row-<?php print $this_row; ?> row-<?php print $take_action_items[$this_row]['row_type']; ?>">
      <div class="content">
        <a class="take-action-group-link" href="<?php print $take_action_items[$this_row]['take_action_url']; ?>">
          <div class="take-action-<?php print $take_action_items[$this_row]['take_action_icon']; ?>-icon"></div>
          <div class="take-action-group-title">
            <?php print $take_action_items[$this_row]['take_action_title']; ?>
          </div>
        </a>
      </div>
    </div>
  <?php } ?>
</div>