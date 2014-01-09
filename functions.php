<?php

add_theme_support( 'post-thumbnails' );

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar'));

if ( function_exists('register_nav_menus') )
register_nav_menus(
	array(
		'main_menu'	=> __('Menu principal')
	)
);


function sanitize_filename_on_upload($filename) {
	$ext = end(explode('.',$filename));
	// Replace all weird characters
	$sanitized = preg_replace('/[^a-zA-Z0-9-_.]/','', substr($filename, 0, -(strlen($ext)+1)));
	// Replace dots inside filename
	$sanitized = str_replace('.','-', $sanitized);
	return strtolower($sanitized.'.'.$ext);
}

add_filter('sanitize_file_name', 'sanitize_filename_on_upload', 10);




add_action( 'pre_get_posts', 'be_exclude_category_from_blog' );
/**
 * Exclude Category from Blog
 * 
 * @author Bill Erickson
 * @link http://www.billerickson.net/customize-the-wordpress-query/
 * @param object $query data
 *
 */
function be_exclude_category_from_blog( $query ) {
	
	global $wp_the_query;
	if( $wp_the_query === $query && $query->is_home() ) {
		$query->set( 'cat', '-223' );
	}
 
}


// [note txt="la description"]
function notetag_func( $atts ) {
	/*extract( shortcode_atts( array(
		'txt' => 'something',
		'bar' => 'something else',
	), $atts ) );*/

	return "<span style='display:none'>($atts[0])</span>";
}
add_shortcode( 'note', 'notetag_func' );


// [chapo] [/chapo]
function chapo_shortcode( $atts, $content = null ) {
	return '<header class="chapeau">' . $content . '</header>';
}
add_shortcode( 'chapo', 'chapo_shortcode' );