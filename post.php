<!-- post.php -->
<!-- <div class="post" id="post-<?php the_ID(); ?>"> -->
   
<div id="article-titre">
	<h2><?php the_title(); ?></h2>
</div>

<?php the_content(); ?>

<a id="bouton-retour" href="listeliens.html">&middot;<span>Retour aux articles</span></a>

<?php get_template_part('postmeta');?>

<div class="comments-template">
	<?php comments_template(); ?>
</div>

<!-- </div> -->

<!-- fin post.php -->