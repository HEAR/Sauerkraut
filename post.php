<!-- post.php -->
<!-- <div class="post" id="post-<?php the_ID(); ?>"> -->
   
<div id="article-titre">
	<h2><?php the_title(); ?></h2>
</div>

<h5 class="meta"><span class="date"><?php the_time('d/m/Y') ?></span> | Par <span class="auteur"><?php 

// récupération des auteurs avec le plugin Co-Author-Plus
if ( function_exists( 'coauthors_posts_links' ) ) {
    //coauthors();
    coauthors_posts_links();
} else {
    //the_author();
    the_author_posts_link();
}
//the_author() ?></span></h5>

<a class="bouton-retour" href="listeliens.html"><span class="puce"></span> <span>Retour aux articles</span></a>

<?php the_content(); ?>


<?php get_template_part('part/article/postmeta');?>


<div class="comments-template">
	<?php comments_template(); ?>
</div>

<!-- </div> -->

<!-- fin post.php -->