<?php
define( 'WP_DEBUG', true );

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

add_action('init', function(){
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
     )
   );
 });
