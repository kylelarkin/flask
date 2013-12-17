<?php
/**
 * Add Pagename Variable for Body Class paramter
 */
function flask_page_name() {
	if( is_page( basename( get_permalink() ) ) ){
		$page_slug = "pagename-" . basename( get_permalink() );
	}else { $page_slug = ''; }
	return $page_slug;
}

/**
 * Truncate a string to desired length without breaking words.
 */
function truncate($string, $length, $tailing_char = '...') {
	if (strlen($string) > $length):
		$string = preg_replace('/\s+?(\S+)?$/', '', substr($string . ' ', 0, $length)) . $tailing_char;
	endif;
	return $string;
}

/**
 * Retrieve WP-formatted content from a post via post ID
 */
function get_the_content_by_id($id) {
	$content = get_post_field('post_content', $id);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/**
 * Retrieve post ID via page/post slug
 */
function get_post_id_from_slug($slug) {
	global $wpdb;
	$id = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT ID FROM $wpdb->posts WHERE post_name = '%s'",
			$slug
		)
	);
	return $id;
}