<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title><?php bloginfo('name') ?><?php if ( is_404() ) : ?> &raquo; <?php _e('Not Found') ?><?php elseif ( is_home() ) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?></title>
 
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
  
  <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.9.1.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.stickem.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.js"></script>

  
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php wp_head(); ?>
  
</head>

<body>

<div class="container">

  <div class="stickem-container">

    <div id="sidebar" class="stickem"><?php get_sidebar(); ?></div>

    <div id="page">

      <header>
        <h1><a href="<?php echo get_settings('home'); ?>">SURKRUT</h1>
        <p class="description">Le blog de l'atelier de communication graphique de l'ESADS/HEAR</p>
        <!--<h1><a href="<?php echo get_settings('home'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/surkrut.jpg" alt="Sürkrüt"/></a></h1>
        <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slogan.jpg" alt="Le blog de l'atelier de communication graphique de l'ESADS/HEAR"/></p>-->
      </header>

    	<nav>
    	<?php
    	if ( has_nav_menu( 'main_menu_gauche' ) ) {
    		wp_nav_menu( array('menu'=>'main_menu') );
    	}
    	?>
    	</nav>
	
<!-- FIN HEADER -->