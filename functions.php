<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'caption' ) );
// comment-list', 'comment-form', 'search-form', 'gallery', 'caption'
// 
add_filter('img_caption_shortcode_width', '__return_false'); // pour éviter d'avoir un max-width sur l'image

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

// https://generatewp.com/shortcodes/
// [note txt="la description"]
function note_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
		'txt' => ''
	), $atts ) );

	// "<span class='note' style='color:red'>(
	return "<span class='note-ref'></span><span class='note-bloc'>".$atts['txt']."</span>";
}
add_shortcode( 'note', 'note_shortcode' );


// [chapo] [/chapo]
function chapo_shortcode( $atts, $content = null ) {
	return '<div class="chapeau">' . $content . '</div>';
}
add_shortcode( 'chapo', 'chapo_shortcode' );


// Nouvelle gallerie
/// cf http://tiffanybbrown.com/2013/02/03/wordpress-adding-custom-galleries-to-your-theme/
 
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'custom_gallery');
 
function custom_gallery($attr) {



	$post = get_post();
 
	static $instance = 0;
	$instance++;
 
	# hard-coding these values so that they can't be broken
	
	$attr['columns'] = 1;
	$attr['size'] = 'full';
	$attr['link'] = 'none';
 
	$attr['orderby'] = 'post__in';
	$attr['include'] = $attr['ids'];		
 
	#Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	
	if ( $output != '' )
		return $output;
 
	# We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
 
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'p',
		'columns'    => 1,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));


 
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';
 
	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
 
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
 
	if ( empty($attachments) )
		return '';
 
	$gallery_style = $gallery_div = '';
 
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "<!-- see gallery_shortcode() in functions.php -->";
	
	/*
	<div class="article-image-slide" onclick="next()">
	    <img src="./images/articletest-galerie2-img1.jpg"/>
	    <img src="./images/articletest-galerie2-img2.jpg"/>
	    <img src="./images/articletest-galerie1-img4.jpg"/>    
	</div>
	 */

	$gallery_div = "<div class='gallery' data-index='0'>";
	
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
	$i = 0;


	foreach ( $attachments as $id => $attachment ) {


		$target = wp_get_attachment_image_src( $id, 'large' );
		$thumb  = wp_get_attachment_image_src( $id, 'large' );
		$legende ='';

		//$legende = get_the_title($id);
		//$legende = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		$legende = addslashes(wptexturize($attachment->post_excerpt));

		
		//$link = wp_get_attachment_link($id, $imageSize , false, false);
 
		
		$output .= '<img data-src src="'.$thumb[0].'" />';

		$i++;
	}

 
	$output .= "</div>\n";

	$output .= "<div class='reset'></div>\n";
 
	return $output;
}



add_filter('the_content', 'gs_add_img_lazy_markup', 15);  // hook into filter and use priority 15 to make sure it is run after the srcset and sizes attributes have been added.

/**
 *
 * Modified from: Sunyatasattva
 * https://wordpress.stackexchange.com/questions/81522/change-html-structure-of-all-img-tags-in-wordpress
 * @param $the_content
 *
 * @return string
 *
 *
 * Initial use of code gave warning: DOMDocument::loadHTML(): Unexpected end tag : p
 * Due to invalid HTML
 *
 * https://stackoverflow.com/questions/11819603/dom-loadhtml-doesnt-work-properly-on-a-server
 *
 * libxml_use_internal_errors(true);
 *
 *
 * https://jhtechservices.com/changing-your-image-markup-in-wordpress/
 */


function gs_add_img_lazy_markup($the_content) {

    libxml_use_internal_errors(true);

    $post = new DOMDocument();

	// https://stackoverflow.com/questions/11768839/utf-8-decode-for-php#11768947
    $post->loadHTML( mb_convert_encoding( $the_content ,'HTML-ENTITIES','utf-8' ) );

    $imgs = $post->getElementsByTagName('img');

    // Iterate each img tag
    foreach( $imgs as $img ) {

        if( $img->hasAttribute('data-src') ) continue;

        // if( $img->parentNode->tagName == 'noscript' ) continue;

        // $clone = $img->cloneNode();

        $src = $img->getAttribute('src');
        // $img->removeAttribute('src');
        $img->setAttribute('data-src', $src);

        $classes = $img->getAttribute('class');

        preg_match_all("/wp-image-([0-9]+)/", $classes, $id_array);

        $img->setAttribute('data-id', $id_array[1][0]);

        // $srcset = $img->getAttribute('srcset');
        // $img->removeAttribute('srcset');
        // if( ! empty($srcset)) {
        //     $img->setAttribute('data-srcset', $srcset);
        // }

        // $imgClass = $img->getAttribute('class');
        // $img->setAttribute('class', $imgClass . ' lazyload');

        // $no_script = $post->createElement('noscript');
        // $no_script->appendChild($clone);
        // $img->parentNode->insertBefore($no_script, $img);
    };

    return $post->saveHTML();
}



