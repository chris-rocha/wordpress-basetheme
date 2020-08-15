<?php
/**
 * @package miles_components
 * @version 1.0
 */
/*
Plugin Name: Miles Components
Description: Creates blocks available to the gutenberg editor.
Author: Miles
Version: 1.0
Author URI: https://milespartnership.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'MilesComponents' ) ) {
	class MilesComponents {

    public static function init() {
			self::includes();
			self::hooks();
		}

		private static function includes() {
      require_once dirname( __FILE__ ) . '/components/carousel.php';
      require_once dirname( __FILE__ ) . '/components/single-promo.php';
		}

		public static function wrap_component_blocks( $block_content, $block ) {
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

    public static function component_render_callback( $block ) {
      $slug = str_replace('acf/', '', $block['name']);
      // include a template part from within the "template-parts" folder
      if( file_exists( get_theme_file_path("/template-parts/gutenberg/component-{$slug}.php") ) ) {
        include( get_theme_file_path("/template-parts/gutenberg/component-{$slug}.php") );
      }
    }

		private static function hooks() {
      add_action( 'render_block', [ __CLASS__, 'wrap_component_blocks' ], 10, 3 );
    }

  }

  add_action( 'plugins_loaded', array( 'MilesComponents', 'init' ) );
}
