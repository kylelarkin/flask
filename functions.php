<?php
/**
 * Include all partial php/helper files
 */
foreach (glob(dirname(__FILE__) . '/lib/' . '*.php') as $filename) {
	require( $filename );
}

/**
 * Move Gravity Forms inline JS into footer after our JS is enqueue'd
 */
function init_scripts() {
	return true;
}
add_filter("gform_init_scripts_footer", "init_scripts");

/**
 * Define own Jquery file via bower.json
 */
function flask_scripts_init() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//code.jquery.com/jquery-1.11.1.min.js', false, null, true); // Set last param to false if getting js errors
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'libs', get_bloginfo( 'template_directory' ) . '/js/dist/libs.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'app', get_bloginfo( 'template_directory' ) . '/js/dist/app.js', array('jquery', 'libs'), null, true );
}
add_action('wp_enqueue_scripts', 'flask_scripts_init');