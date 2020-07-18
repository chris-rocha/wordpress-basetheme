<?php
// wrap gutenberg blocks
function wrap_component_blocks( $block_content, $block ) {
	$no_wrap = array(
		null,
		'acf/hero-component',
		'acf/side-by-side'
	);

	if(!in_array($block['blockName'], $no_wrap)) {
			$block_content = '<div class="body-max-width"><div class="container">' . $block_content . '</div></div>';
	}

	return $block_content;
}
add_filter( 'render_block', 'wrap_component_blocks', 10, 3);

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      // 'extra-menu' => __( 'Extra Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
