<?php

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueues.php';
// components
require get_template_directory() . '/components/hero-component.php';
require get_template_directory() . '/components/single-promo.php';
require get_template_directory() . '/components/flex-box-promo.php';
require get_template_directory() . '/components/carousel.php';

function _generate_unique_id( $prefix = '' ) {
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

class Mega_Walker_MegaMenu extends Walker_Nav_Menu {
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
			$output .= "\n$indent<span class=\"fill coastal-aqua-20 material-icons show-submenu trigger mobile-only\" tabindex=\"0\">keyboard_arrow_right</span><div class=\"child\"><div class=\"head fill coastal-aqua-20 mobile-only body-max-width\"><div class=\"container\"><ul><li><a href=\"#\" class=\"trigger hide-submenu\"><span class=\"material-icons\">keyboard_arrow_left</span> Back</a></li><li><a href=\"\">Why Collier County</a></li></ul></div></div><div class=\"body-max-width\"><div class=\"container\"><ul class=\"links\">\n";
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

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}

			$output .= "</li>{$n}";

	}

}
