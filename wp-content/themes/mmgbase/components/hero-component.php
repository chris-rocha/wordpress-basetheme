<?php
if( function_exists('acf_add_local_field_group') ) {
  acf_add_local_field_group(array(
    'key' => 'group_hero_component',
    'title' => 'Hero component',
    'location' => array(
      array(
        array(
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/hero-component',
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
  // title field
  acf_add_local_field(array(
    'key' => 'field_hero_component_title',
    'label' => 'Title',
    'name' => 'title',
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
    'parent' => 'group_hero_component',
  ));
  // subhead field
  acf_add_local_field(array(
    'key' => 'field_hero_component_subhead',
    'label' => 'Subhead',
    'name' => 'subhead',
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
    'parent' => 'group_hero_component',
  ));
  // image field
  acf_add_local_field(array(
    'key' => 'field_hero_component_img',
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
    'return_format' => 'array',
    'preview_size' => 'thumbnail',
    'library' => 'all',
    'min_width' => '',
    'min_height' => '',
    'min_size' => '',
    'max_width' => '',
    'max_height' => '',
    'max_size' => '',
    'mime_types' => '',
    'parent' => 'group_hero_component',
));


  // video field
  acf_add_local_field(array(
    'key' => 'field_hero_component_video',
    'label' => 'Video',
    'name' => 'video',
    'type' => 'file',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'default_value' => '',
    'parent' => 'group_hero_component',
    /* (string) Specify the type of value returned by get_field(). Defaults to 'array'.
    Choices of 'array' (File Array), 'url' (File URL) or 'id' (File ID) */
    'return_format' => 'url',

    /* (string) Specify the file size shown when editing. Defaults to 'thumbnail'. */
    'preview_size' => 'thumbnail',

    /* (string) Restrict the file library. Defaults to 'all'.
    Choices of 'all' (All Files) or 'uploadedTo' (Uploaded to post) */
    'library' => 'all',

    /* (int) Specify the minimum filesize in MB required when uploading. Defaults to 0
    The unit may also be included. eg. '256KB' */
    'min_size' => 0,

    /* (int) Specify the maximum filesize in MB in px allowed when uploading. Defaults to 0
    The unit may also be included. eg. '256KB' */
    'max_size' => 0,

    /* (string) Comma separated list of file type extensions allowed when uploading. Defaults to '' */
    'mime_types' => '',
    ));
}

// function hero_component() {

//   // check function exists
//   if( function_exists('acf_register_block') ) {

//       // register a hero block
//       acf_register_block(array(
//           'name'              => 'hero_component',
//           'title'             => __('Hero component block'),
//           'description'       => __('Hero with looping video'),
//           'render_callback'   => 'component_render_callback',
//           'category'          => 'formatting',
//           'icon'              => 'layout',
//           'mode'              => 'auto',
//           'keywords'          => array( 'hero', 'block' ),
//       ));
//   }
// }
// add_action('acf/init', 'hero_component');

if( function_exists('acf_register_block') ) {
  add_action('acf/init', function(){
      acf_register_block(array(
          'name'              => 'hero_component',
          'title'             => __('Hero component block'),
          'description'       => __('Hero with looping video'),
          'render_callback'   => 'component_render_callback',
          'category'          => 'formatting',
          'icon'              => 'layout',
          'mode'              => 'auto',
          'keywords'          => array( 'hero', 'block' ),
      ));
  });
}
