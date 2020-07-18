<?php

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/components/hero-component.php';

/**
 * Enqueue scripts and styles.
 */
function mmgbase_scripts() {
	wp_enqueue_style( 'mmgbase-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_register_style('googlefonts', 'https://fonts.googleapis.com/icon?family=Material+Icons' , false, null);
	wp_enqueue_style('googlefonts');

	wp_register_style('typekit', 'https://use.typekit.net/lfs2imh.css' , false, null);
	wp_enqueue_style('typekit');

	// wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );


	wp_register_script('cookie-js', get_template_directory_uri() . '/js/cookieconsent.min.js', array('jquery'), null, true);
	wp_enqueue_script('cookie-js');

	wp_register_script('vue-js', get_template_directory_uri() . '/js/vue.min.js', array(), null, true);
	wp_enqueue_script('vue-js');

	wp_register_script('site-js', get_template_directory_uri() . '/js/site.bundle.js', array('jquery'), null, true);
	wp_enqueue_script('site-js');

}
add_action( 'wp_enqueue_scripts', 'mmgbase_scripts' );

function twentytwenty_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

// component template suggestions
function component_render_callback( $block ) {
	$slug = str_replace('acf/', '', $block['name']);
	// include a template part from within the "template-parts" folder
	if( file_exists( get_theme_file_path("/template-parts/gutenberg/component-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/gutenberg/component-{$slug}.php") );
	}
}

class my_Walker_MegaMenu extends Walker_Nav_Menu{
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			//$output .= "\n$indent<ul class=\"sub-menu\">\n"; //this is default output;

			//if( $depth==0 ) //'0'==>1st-sub-level; '1'=2nd-sub-level; ....
			$output .= "\n$indent<div class=\"child\"><div class=\"body-max-width\"><div class=\"container\"><ul class=\"links\">\n";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			//$output .= "$indent</ul>\n"; //this is default output;

			//if( $depth==0 ) //'0'==>1st-sub-level; '1'=2nd-sub-level; ....
			$output .= "$indent</ul></div></div></div></div>\n"; // extra div here because of 'before' without 'after'
	}
}
