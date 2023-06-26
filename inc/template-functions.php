<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package shaheer
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function shaheer_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'shaheer_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shaheer_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'shaheer_pingback_header' );

/**
 * Changes ACF JSON directory
 *
 * @param  string $path Default ACF JSON directory
 * @return string
 */
function ja_acf_json_save_point($path) {
	return get_stylesheet_directory() . '/inc/acf-json';
}
add_filter('acf/settings/save_json', 'ja_acf_json_save_point');

/**
 * Loads ACF JSON
 *
 * @param array $paths ACF JSON directory paths
 * @return array
 */
function ja_acf_json_load_point($paths) {
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/inc/acf-json';

	return $paths;
}
add_filter('acf/settings/load_json', 'ja_acf_json_load_point');

/**
 * Support Theme Settings Menu
 */
if ( function_exists('acf_add_options_sub_page') ) {
  acf_add_options_sub_page(array(
  'page_title'    => __( 'Theme Settings', 'shaheer'),
  'menu_title'    => __( 'Theme Settings', 'shaheer'),
  'parent_slug'   => 'themes.php',
  'capability'    => 'manage_options',
  'position'      => 59
));
}

/**
 * Add SVG Upload Support
 */
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
  }
  add_filter('upload_mimes', 'add_file_types_to_uploads');

