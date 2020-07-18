<?php
if( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group(array(
    'key' => 'group_single_promo',
    'title' => 'Single promo',
    'location' => array(
      array(
        array(
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/single-promo',
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
  // image field
  acf_add_local_field(array(
    'key' => 'field_single_promo_img',
    'label' => 'Image',
    'name' => 'image',
    'type' => 'image',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'return_format' => 'url',
    'preview_size' => 'thumbnail',
    'library' => 'all',
    'min_width' => '',
    'min_height' => '',
    'min_size' => '',
    'max_width' => '',
    'max_height' => '',
    'max_size' => '',
    'mime_types' => '',
    'parent' => 'group_single_promo',
  ));
  // title field
  acf_add_local_field(array(
    'key' => 'field_single_promo_title',
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
    'parent' => 'group_single_promo',
  ));
  // link field
  acf_add_local_field(array(
    'key' => 'field_single_promo_link',
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
    'parent' => 'group_single_promo',
  ));

}

if( function_exists('acf_register_block') ) {
  add_action('acf/init', function(){
      acf_register_block(array(
          'name'              => 'single_promo',
          'title'             => __('Single Promo'),
          'description'       => __('Optional image'),
          'render_callback'   => 'component_render_callback',
          'category'          => 'formatting',
          'icon'              => 'layout',
          'mode'              => 'auto',
          'keywords'          => array( 'single', 'promo', 'block' ),
      ));
  });
}
