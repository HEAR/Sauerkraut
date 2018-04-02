<!-- post.php -->
   
<header>
<h2 class="article-titre"><?php the_title(); ?></h2>

<h5 class="meta"><span class="date"><?php the_time('d/m/Y') ?></span> <span class="puce"></span> Par <span class="auteur"><?php 

// récupération des auteurs avec le plugin Co-Author-Plus
if ( function_exists( 'coauthors_posts_links' ) ) {
    //coauthors();
    coauthors_posts_links();
} else {
    //the_author();
    the_author_posts_link();
}
//the_author() ?></span> <a class="bouton-retour" href="listeliens.html"><span class="puce"></span> <span>Retour aux articles</span></a></h5>

</header>



<?php the_content(); ?>


<footer>

<?php get_template_part('part/article/postmeta');?>

<div class="comments-template">
	<?php comments_template(); ?>
</div>

</footer>


<!-- fin post.php -->