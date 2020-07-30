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

if( function_exists('acf_register_block') ) {
  add_action('acf/init', function(){
      acf_register_block(array(
          'name'              => 'hero_component',
          'title'             => __('Hero component block'),
          'description'       => __('Hero with looping video'),
          'render_callback'   => 'component_render_callback',
          'category'          => 'formatting',
          'icon'              => 'layout',
          'mode'              => 'edit',
          'keywords'          => array( 'hero', 'block' ),
      ));
  });
}

/**
 * Testimonial Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function my_acf_block_render_callback( $block, $content = '', $is_preview = false, $post_id = 0 ) {

	wp_register_script('my_js_library', get_template_directory_uri() . '/js/test.js');

	$my_array = [
    'title' => get_field('title'),
    'block' => $block,
    'content' => $content,
    'post_id' => $post_id,
    'video' => get_field('field_hero_component_video')
  ];
	wp_localize_script( 'my_js_library', $block['id'], $my_array );

	wp_enqueue_script( 'my_js_library');

  ?>
  <div id="<?php echo esc_attr($block['id']); ?>">
    <h1>hello</h1>
  </div>
  <?php
}
