<?php
if( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group(array(
    'key' => 'group_flex_box_promo',
    'title' => 'Flex box promo',
    'location' => array(
      array(
        array(
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/flex-box-promo',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
  ));
    acf_add_local_field(array(
    'key' => 'field_flex_box_promo_repeater',
    'label' => 'Items',
    'name' => 'items',
    'type' => 'repeater',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'default_value' => '',
    'min' => 0,
    'max' => 2,
    'layout' => 'row',
    'button_label' => 'Add another',
    'parent' => 'group_flex_box_promo',
    'sub_fields' => array(
      array(
        'key' => 'field_flex_box_promo_title',
        'label' => 'Heading',
        'name' => 'heading',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_flex_box_promo_icon',
        'label' => 'Icon',
        'name' => 'icon',
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'choices' => array(
          'aviation-and-aerospace' => 'Aviation and Aerospace',
          'cleantech' => 'Cleantech',
          'contact-us' => 'Contact Us',
          'defense-and-homeland-security' => 'Defense and Homeland Security',
          'download' => 'Download',
          'emerging-technology' => 'Emerging Technology',
          'events' => 'Events',
          'expand' => 'Expand',
          'external-link' => 'External Link',
          'fast-track' => 'Fast Track',
          'file-folder' => 'File Folder',
          'financial-and-professional-services' => 'Financial and Professional Services',
          'infotech' => 'Infotech',
          'life-sciences' => 'Life Sciences',
          'manufacturing' => 'Manufacturing',
          'map-pin' => 'Map Pin',
          'news' => 'News',
          'property-search' => 'Property Search',
          'services' => 'Services',
          'settings' => 'Settings',
          'staff' => 'Staff',
          'startup' => 'Startup',
          'submit-a-property' => 'Submit a Property',
        ),
        /* (bool) Allow a null (blank) value to be selected. Defaults to 0 */
        'allow_null' => 0,
        /* (bool) Allow mulitple choices to be selected. Defaults to 0 */
        'multiple' => 0,
        /* (bool) Use the select2 interfacte. Defaults to 0 */
        'ui' => 0,
        /* (bool) Load choices via AJAX. The ui setting must also be true for this to work. Defaults to 0 */
        'ajax' => 0,
        /* (string) Appears within the select2 input. Defaults to '' */
        'placeholder' => '',
      ),
      array(
        'key' => 'field_flex_box_promo_link',
        'label' => 'Link',
        'name' => 'link',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
    ),
  ));
}

if( function_exists('acf_register_block') ) {
  add_action('acf/init', function(){
      acf_register_block(array(
          'name'              => 'flex_box_promo',
          'title'             => __('Flex box promo'),
          'description'       => __('limit two promos'),
          'render_callback'   => 'flex_box_render_callback',
          'category'          => 'formatting',
          'icon'              => 'layout',
          'mode'              => 'auto',
          'keywords'          => array( 'flex', 'promo', 'box' ),
      ));
  });
}

function flex_box_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {

	wp_register_script('my_js_library', get_template_directory_uri() . '/js/test.js');

  $data = [];

  if( have_rows('field_flex_box_promo_repeater') ) {
    while( have_rows('field_flex_box_promo_repeater') ) {
      the_row();
      $data[] = [
        'title' => get_sub_field('field_flex_box_promo_title'),
        'icon' => get_sub_field('field_flex_box_promo_icon'),
        'link' => get_sub_field('field_flex_box_promo_link'),
      ];
    }
  }

  wp_localize_script( 'my_js_library', $block['id'], $data );

	wp_enqueue_script( 'my_js_library');

  ?>
  <div id="<?php echo esc_attr($block['id']); ?>">
    <h1>hello</h1>
    <pre><?php print_r($data); ?></pre>
  </div>
  <?php
}
