<?php
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
		'core/button'
	);

	if(!in_array($block['blockName'], $no_wrap)) {
			$block_content = '<div class="body-max-width"><div class="container">' . $block_content . '</div></div>';
	}

	return $block_content;
}
add_filter( 'render_block', 'wrap_component_blocks', 10, 3);

// function register_my_menus() {
//   register_nav_menus(
//     array(
//       'header-menu' => __( 'Header Menu' ),
//       // 'extra-menu' => __( 'Extra Menu' )
//      )
//    );
//  }
 add_action('init', function(){
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
     )
   );
 });
