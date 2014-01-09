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

?>