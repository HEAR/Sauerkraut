<?php get_header(); ?>

<!-- home.php -->


<div id="principal">
		<div id="contenu">
			<div id="indexSlider">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
					<?php //get_template_part('post'); ?> 
					<!-- <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> -->
					<img src="http://localhost:8888/HEAR-SURKRUT/wp-content/uploads/2014/02/mirador-macro-1024x682.jpg"/>
			 
			<?php endwhile; ?>
			</div>
		</div>

		
		

		<div class="navigation">
		
		<?php //posts_nav_link(' - ','page suivante','page pr&eacute;c&eacute;dente'); 

		$big = 999999999; // need an unlikely integer

		/*echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'prev_next' => true,
			'prev_text' => 'Plus récent',
			'next_text' => 'Plus ancien',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );*/
		?>
		</div>
		<?php else : ?>
		<h2>Aucun résultat</h2>
		<p>Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici .</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php endif; ?>
</div>

<!-- fin home.php -->


<?php get_footer(); ?>