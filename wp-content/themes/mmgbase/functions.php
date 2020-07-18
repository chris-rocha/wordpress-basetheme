<?php

/**
 * Enqueue scripts and styles.
 */
function mmgbase_scripts() {
	wp_enqueue_style( 'mmgbase-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_register_style('googlefonts', 'https://fonts.googleapis.com/icon?family=Material+Icons' , false, null);
	wp_enqueue_style('googlefonts');
	// wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );


	wp_register_script('cookie-js', get_template_directory_uri() . '/js/cookieconsent.min.js', array('jquery'), null, true);
	wp_enqueue_script('cookie-js');

	wp_register_script('vue-js', get_template_directory_uri() . '/js/vue.min.js', array(), null, true);
	wp_enqueue_script('vue-js');

	wp_register_script('site-js', get_template_directory_uri() . '/js/site.bundle.js', array('jquery'), null, true);
	wp_enqueue_script('site-js');

}
add_action( 'wp_enqueue_scripts', 'mmgbase_scripts' );
add_filter( 'render_block', 'wrap_component_blocks', 10, 3);

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

function twentytwenty_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}
