<?php
/**
 * Enqueue scripts and styles.
 */
function mmgbase_scripts() {
	wp_enqueue_style( 'mmgbase-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_register_style('googlefonts', 'https://fonts.googleapis.com/icon?family=Material+Icons' , false, null);
	wp_enqueue_style('googlefonts');

	wp_register_style('typekit', 'https://use.typekit.net/lfs2imh.css' , false, null);
	wp_enqueue_style('typekit');

	wp_register_script('cookie-js', get_template_directory_uri() . '/js/cookieconsent.min.js', array('jquery'), null, true);
	wp_enqueue_script('cookie-js');

	wp_register_script('vue-js', get_template_directory_uri() . '/js/vue.min.js', array(), null, true);
	wp_enqueue_script('vue-js');

	wp_register_script('site-js', get_template_directory_uri() . '/js/site.bundle.js', array('jquery'), null, true);
	wp_enqueue_script('site-js');

}
add_action( 'wp_enqueue_scripts', 'mmgbase_scripts' );
