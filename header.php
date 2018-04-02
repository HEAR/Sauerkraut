<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title><?php bloginfo('name') ?><?php if ( is_404() ) : ?> &raquo; <?php _e('Not Found') ?><?php elseif ( is_home() ) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?></title>
 
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
  <meta name="viewport" content="width=device-width, maximum-scale=1.0">

  <link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
  <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.lockfixed.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fitvids.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.slides.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/jquery.fancybox.pack.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.js"></script>

  
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  
  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>

	<div id="titre">
		<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</div>



	<div id="barreinfo">
		<a href="apropos.html">À propos</a>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	</div>

	<!-- MENU -->

	<nav id="menu">
		<?php // get_sidebar(); ?>
		<div class="dropdown">
			<div onclick="displayLabo()" class="dropbtn">Laboratoire</div>
			<ul id="labo" class="dropdown-content">
				<li><a href="listeliens.html">Ateliers</a></li>
				<li><a href="listeliens.html">Expériences</a></li>
				<li><a href="listeliens.html">Recherche</a></li>
				<li><a href="listeliens.html">Workshop</a></li>
			</ul>
		</div>
		<div class="dropdown">
			<div onclick="displayObs()" class="dropbtn">Observatoire</div>
			<ul id="obs" class="dropdown-content">
				<li><a href="listeliens.html">Publications</a></li>
				<li><a href="listeliens.html">Notes de lecture</a></li>
				<li><a href="listeliens.html">Notes de voyage</a></li>
				<li><a href="listeliens.html">Design interactif</a></li>
				<li><a href="listeliens.html">Portrait d'anciens</a></li>
				<li><a href="listeliens.html">Sürblog</a></li>
			</ul>
		</div>
	</nav>

	<!-- FIN MENU -->



	<main>
    	
	
<!-- fin header.php -->