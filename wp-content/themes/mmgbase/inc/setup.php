<?php
// Add theme support for selective refresh for widgets.
add_theme_support( 'customize-selective-refresh-widgets' );

// Add support for Block Styles.
add_theme_support( 'wp-block-styles' );

// Add support for full and wide align images.
add_theme_support( 'align-wide' );

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

add_action( 'after_setup_theme', function(){
  add_theme_support( 'post-thumbnails' );
	add_image_size( 'hero', 1920, 1080, array( 'center', 'center' ));
});



// wrap gutenberg blocks
function wrap_component_blocks( $block_content, $block ) {
	$no_wrap = array(
		null,
		'acf/hero-component',
		'acf/single-promo',
		'acf/flex-box-promo',
		'acf/carousel',
		'core/button',
		'core/html'
	);

	if(!in_array($block['blockName'], $no_wrap)) {
			$block_content = '<div class="body-max-width"><div class="container">' . $block_content . '</div></div>';
	}

	return $block_content;
}
add_filter( 'render_block', 'wrap_component_blocks', 10, 3);

add_action('init', function(){
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
     )
   );
 });
