<?php get_header(); ?>

<!-- single.php -->


<div id="article">
			


<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
       <?php get_template_part('post'); ?> 
<?php endwhile; ?>

	<div class="navigation">
	<?php posts_nav_link(' - ','page suivante','page pr&eacute;c&eacute;dente'); ?>
	</div>
<?php else : ?>
	<h2>Aucun résultat</h2>
	<p>Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici .</p>
	<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
	
			
</div>

<!-- fin single.php -->

<?php get_footer(); ?>