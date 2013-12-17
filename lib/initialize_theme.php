<?php
/**
 * Add custom navigation to theme and adds Primary Navigation menu
 */
function flask_menus_init() {
	register_nav_menus(
	array(
			'primary-header-menu' => __( 'Primary Header Menu' ),
			'primary-footer-menu' => __( 'Primary Footer Menu' )
		)
	);
}
add_action( 'init', 'flask_menus_init' );

/**
 * Prepare menus for first use
 */
function flask_menus_bootstrap() {
	// Add custom navigation to theme and adds Primary Navigation menu
	if (!term_exists('Primary Header Menu', 'nav_menu')) {

		// Select this menu in the current theme
		$menu = wp_insert_term('Primary Header Menu', 'nav_menu', array('slug' => 'primary-header-menu'));
		update_option('theme_mods_flask', array("nav_menu_locations" => array("primary-header-menu" => $menu['term_id'])));

		// Insert new page
		$home = wp_insert_post(array(
				'post_type'    => 'page',
				'post_title'    => 'Home',
				'post_status'   => 'publish',
				'post_author'   => 1,
				'post_category' => array(8,39)
			));

		update_option( 'page_on_front', $home );
		update_option( 'show_on_front', 'page' );

		// Insert new nav_menu_item (order matters for display purposes)
		$home_nav_item_footer = wp_insert_post(array(
				'post_title' => 'Home',
				'post_content' => '',
				'post_status' => 'publish',
				'post_type' => 'nav_menu_item'
			));

		add_post_meta($home_nav_item_footer, '_menu_item_type', 'post_type');
		add_post_meta($home_nav_item_footer, '_menu_item_menu_item_parent', '0');
		add_post_meta($home_nav_item_footer, '_menu_item_object_id', $home);
		add_post_meta($home_nav_item_footer, '_menu_item_object', 'page');
		add_post_meta($home_nav_item_footer, '_menu_item_target', '');
		add_post_meta($home_nav_item_footer, '_menu_item_xfn', '');
		add_post_meta($home_nav_item_footer, '_menu_item_url', '');

		wp_set_object_terms($home_nav_item_footer, 'Primary Footer Menu', 'nav_menu');

		// Insert new nav_menu_item (order matters for display purposes)
		$home_nav_item_header = wp_insert_post(array(
				'post_title' => 'Home',
				'post_content' => '',
				'post_status' => 'publish',
				'post_type' => 'nav_menu_item'
			));

		add_post_meta($home_nav_item_header, '_menu_item_type', 'post_type');
		add_post_meta($home_nav_item_header, '_menu_item_menu_item_parent', '0');
		add_post_meta($home_nav_item_header, '_menu_item_object_id', $home);
		add_post_meta($home_nav_item_header, '_menu_item_object', 'page');
		add_post_meta($home_nav_item_header, '_menu_item_target', '');
		add_post_meta($home_nav_item_header, '_menu_item_xfn', '');
		add_post_meta($home_nav_item_header, '_menu_item_url', '');

		wp_set_object_terms($home_nav_item_header, 'Primary Header Menu', 'nav_menu');
	}
	if (!term_exists('Primary Footer Menu', 'nav_menu')) {
		$menu2 = wp_insert_term('Primary Footer Menu', 'nav_menu', array('slug' => 'primary-footer-menu'));
		update_option('theme_mods_flask', array("nav_menu_locations" => array("primary-footer-menu" => $menu2['term_id'])));
	}
}

/**
 * Setup to run once upon theme activation
 */
function flask_run_options_once() {
	$check = get_option('flask_activation_check');
	if ( $check != "set" ) {

		// set permalinks
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		$wp_rewrite->flush_rules();

		// run menu registration
		flask_menus_bootstrap();

		// Add marker so it doesn't run in future
		add_option('flask_activation_check', "set");
	}
}
add_action('init', 'flask_run_options_once');