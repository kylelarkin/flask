<?php
/**
 * Include all partial php/helper files
 */
foreach (glob(dirname(__FILE__) . '/lib/' . '*.php') as $filename) {
	require( $filename );
}

// Define own Jquery file via bower.json
function flask_scripts_init() {
	wp_deregister_script( 'jquery' );
	// wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js','','',false);
	// wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'flask_scripts_init');