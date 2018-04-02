<?php get_header(); ?>

<!-- single.php -->


<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> >
			
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
       <?php get_template_part('part/article/post'); ?> 
<?php endwhile; ?>

	<div class="navigation">
	<?php posts_nav_link(' - ','page suivante','page pr&eacute;c&eacute;dente'); ?>
	</div>
<?php else : ?>

	<h2>Aucun résultat</h2>
	<p>Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici .</p>
	<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>
	
			
</article>

<!-- fin single.php -->

<?php get_footer(); ?>